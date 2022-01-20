<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Compat\Deprecation;

use PHPUnit\Framework\TestCase;
use SeaTable\SeaTableApi\Exception;

/**
 * Class PhpTest
 *
 * @covers \SeaTable\SeaTableApi\Compat\Deprecation\PhpTest
 */
class PhpTest extends TestCase
{
    const REGEX_PKG_VERSION = '(?:dev-[a-z]{4,}|\Q1.0.0+no-version-set\E)';

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite()
     * @return void
     */
    public function testCallSite()
    {
        $call = Php::callSite(-1);
        $line = __LINE__ - 1;
        $this->assertSame(__FILE__, $call['file']);
        $this->assertSame($line, $call['line']);

        $expected = sprintf(' in %s on line %s', __FILE__, $line);
        $this->assertSame($expected, $call['location']);

        $notMe = Php::callSite();
        $this->assertNotEquals(__FILE__, $notMe['file'], 'one below is not the same file');
    }

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @return void
     */
    public function testCallSiteAt()
    {
        // test with more stack frames that are predictable:
        $offset = __LINE__;
        $inStackingAt = static function (int $insertStacks, int $at = 0) {
            $stacking = static function (int $stacks) use (&$stacking, $at) {
                return (0 >= --$stacks) ? Php::callSite($at) : $stacking($stacks); # $offset + 3
            };
            return (0 >= --$insertStacks) ? Php::callSite($at) : $stacking($insertStacks); # $offset + 5
        };

        $default = $inStackingAt(1, 0);
        $this->assertSame(__FILE__, $default['file'], 'default file');
        $this->assertSame(__LINE__ - 2, $default['line'], 'default line');

        $oneUp = $inStackingAt(2, 0);
        $this->assertSame($offset + 5, $oneUp['line'], 'inserted one test frame line');

        $twoUp = $inStackingAt(3, 0);
        $this->assertSame($offset + 3, $twoUp['line'], 'inserted two test frames line');

        $threeUp = $inStackingAt(4, 0);
        $this->assertSame($offset + 3, $threeUp['line'], 'inserted three test frames line');

        $self = $inStackingAt(2, 1);
        $this->assertSame(__FILE__, $self['file'], 'self file');
        $this->assertSame(__LINE__ - 2, $self['line'], 'self line');

        $parent = $inStackingAt(1, 1);
        $this->assertNotSame(__FILE__, $parent['file'], 'parent file');

        $parentAgain = $inStackingAt(2, 2);
        $this->assertSame($parent['file'], $parentAgain['file'], 'parent again file');
        $this->assertSame($parent['line'], $parentAgain['line'], 'parent again line');
    }

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::pkgVersion
     * @return void
     */
    public function testPkgVersion()
    {
        $actual = Php::pkgVersion('seatable/seatable-api-php');
        is_string($actual) && $this->assertMatchesRegularExpression('(^' . self::REGEX_PKG_VERSION . '$)D', $actual);
        $actual || $this->assertNull($actual);
    }

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::versionCheck()
     * @return void
     * @throws \Throwable
     */
    public function testVersionCheckTriggers()
    {
        $this->assertPhpVersionTriggersNot(70400 + 1);
        $this->assertPhpVersionTriggersNot(70400);
        $this->assertPhpVersionTriggers(70400 - 1);
    }

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::versionCheck()
     * @return void
     * @throws \Throwable
     */
    public function testVersionCheckThrows()
    {
        $this->assertPhpVersionTriggers(70000 + 1);
        $this->assertPhpVersionTriggers(70000);
        $this->expectException(Exception::class);
        $this->assertPhpVersionTriggers(70000 - 1);
    } // @codeCoverageIgnore

    /**
     * @throws \Throwable
     */
    private function assertPhpVersionTriggers(int $phpVersionId, bool $not = false)
    {
        $this->pointPhpVersionId($phpVersionId);
        error_clear_last();
        try {
            @Php::versionCheck();
        } catch (\Throwable $t) {
            $this->pointPhpVersionId();
            throw $t;
        }
        $error = error_get_last();
        $this->pointPhpVersionId();

        if (null === $error && $not) {
            $this->addToAssertionCount(1);
            return;
        }
        null === $error && $this->fail(__METHOD__ . ': an expected error was not triggered');

        $this->assertSame(E_USER_DEPRECATED, $error['type']);
        $this->assertStringContainsString(
            vsprintf('this PHP version %d.%d.%d is deprecated', sscanf(PHP_VERSION, '%d.%d.%d')),
            $error['message']
        );
        $this->assertStringContainsString('is deprecated since 0.1.8', $error['message']);
        $this->assertStringContainsString('Use PHP version 7.4.0 or later', $error['message']);
    }

    /**
     * @throws \Throwable
     */
    private function assertPhpVersionTriggersNot(int $phpVersionId)
    {
        $this->assertPhpVersionTriggers($phpVersionId, true);
    }

    private function pointPhpVersionId(int $phpVersionId = PHP_VERSION_ID)
    {
        $property = (new \ReflectionClass(Php::class))->getProperty('PHP_VERSION_ID');
        $property->setAccessible(true);
        $property->setValue($phpVersionId);
    }
}
