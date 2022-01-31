<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\Compat\Deprecation;

use OutOfBoundsException;
use SeaTable\SeaTableApi\Exception;
use SeaTable\SeaTableApi\TestCase;

/**
 * Class PhpTest
 *
 * @covers \SeaTable\SeaTableApi\Compat\Deprecation\PhpTest
 */
class PhpTest extends TestCase
{
    const REGEX_PKG_VERSION = '(?:dev-[a-z]{4,}|v\d+\.\d+.\d+|\Q1.0.0+no-version-set\E)';

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @return void
     */
    public function testCallSite()
    {
        $call = Php::callSite(-1);
        $line = __LINE__ - 1;
        $this->assertSame(__FILE__, $call['file']);
        $this->assertSame($line, $call['line']);

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
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @return void
     */
    public function testCallSiteOutOfBounds()
    {
        $this->expectExceptionMessage('no call site at 999');
        $this->expectExceptionCode(0);
        $this->expectException(OutOfBoundsException::class);
        !Php::callSite(999);
    } // @codeCoverageIgnore

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
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     * @return void
     */
    public function testTriggerDeprecation()
    {
        @Php::triggerDeprecation('0.0.42', 'Silenced. Foo %s.', 'bar');

        $this->expectDeprecationMessage('Since seatable/seatable-api-php 0.0.42: Foo bar.');
        $this->expectDeprecation();
        Php::triggerDeprecation('0.0.42', 'Foo %s.', 'bar');
    } // @codeCoverageIgnore

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerMethodDeprecation
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::callSite
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
     *
     * @return void
     */
    public function testTriggerMethodDeprecation()
    {
        @Php::triggerMethodDeprecation('0.0.42', 'silenced');

        $this->expectDeprecationMessage(
            'Since seatable/seatable-api-php 0.0.42: Compat\Deprecation\PhpTest::testTriggerMethodDeprecation() is deprecated in'
        );
        $this->expectDeprecation();
        Php::triggerMethodDeprecation('0.0.42');
    } // @codeCoverageIgnore

    /**
     * @covers  \SeaTable\SeaTableApi\Compat\Deprecation\Php
     * @depends testTriggerMethodDeprecation
     *
     * @return void
     */
    public function testTriggerMethodDeprecationCallSite()
    {
        @Php::triggerMethodDeprecation('0.0.42', 'silenced');

        $trigger = static function () {
            Php::triggerMethodDeprecation('0.0.42');
        };

        $this->expectDeprecationMessage(
            sprintf(
                'Since seatable/seatable-api-php 0.0.42: Compat\Deprecation\PhpTest::Compat\Deprecation\{closure}() is deprecated in %s on line %d',
                __FILE__,
                __LINE__ + 4
            )
        );
        $this->expectDeprecation();
        $trigger();
    } // @codeCoverageIgnore

    /**
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::versionCheck
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
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
     * @covers \SeaTable\SeaTableApi\Compat\Deprecation\Php::versionCheck
     * @uses   \SeaTable\SeaTableApi\Compat\Deprecation\Php::triggerDeprecation
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
            vsprintf('Since seatable/seatable-api-php 0.1.8: This PHP version %d.%d.%d is deprecated', sscanf(PHP_VERSION, '%d.%d.%d')),
            $error['message']
        );
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
