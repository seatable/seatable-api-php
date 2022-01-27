<?php

declare(strict_types=1);

/*
 * seatable-api-php
 */

namespace SeaTable\SeaTableApi\SeaTableApi;

use ReflectionClass;
use ReflectionMethod;
use SeaTable\SeaTableApi\SeaTableApi;
use SeaTable\SeaTableApi\TestCase;
use UnexpectedValueException;

/**
 * @covers \SeaTable\SeaTableApi\SeaTableApi\MethodsTest
 * @covers \SeaTable\SeaTableApi\SeaTableApi\DocCommentSpy
 * @covers \SeaTable\SeaTableApi\SeaTableApi\PregGrepResult
 * @covers \SeaTable\SeaTableApi\SeaTableApi\PregPattern
 */
class MethodsTest extends TestCase
{
    private $prefixes = ['sysAdmin', 'teamAdmin'];

    public function provideApiMethods(): array
    {
        return [[$this->getPublicMethods()]];
    }

    /**
     * @return array<string, ReflectionMethod>
     */
    private function getPublicMethods(): array
    {
        $class = SeaTableApi::class;
        $public = (new ReflectionClass($class))->getMethods(ReflectionMethod::IS_PUBLIC);
        $names = array_map(static function (ReflectionMethod $method) {
            return $method->getName();
        }, $public);
        /** @var array<string, ReflectionMethod> $public */
        $public = array_combine($names, $public);
        unset($public['__construct']);
        return $public;
    }

    /**
     * @param string $name
     * @param int|null $limit
     * @return array<int, string>
     */
    private function getWords(string $name, ?int $limit): array
    {
        $limit = $limit ?? 512;
        $words = preg_split('~(2FA|[A-Z]+[a-z]*)~', $name, $limit + 1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        if ($limit && count($words) > $limit) {
            throw new UnexpectedValueException('word limit hit: ' . $limit);
        }
        return $words;
    }

    /**
     * @dataProvider provideApiMethods
     *
     * @param array<string, ReflectionMethod> $public [optional]
     * @return array{words: array<string, array<string, ReflectionMethod>>, verbs: array<string, array<string, ReflectionMethod>>}
     */
    public function testMethodNamingConvention(array $public = null): array
    {
        $public = $public ?? $this->getPublicMethods();

        $wordLimit = 6;
        $words = [];
        $verbs = [];
        $prefixes = [];

        foreach ($public as $name => $method) {
            $prefix = null;
            $suffix = array_reduce($this->prefixes, static function ($carry, $item) use (&$prefix) {
                if (null === $prefix && 0 === strpos($carry, $item)) {
                    $prefix = $item;
                    $carry = substr($carry, strlen($item));
                    $carry[0] = strtolower($carry[0]);
                }
                return $carry;
            }, $name);

            [$verb] = $parts = $this->getWords($suffix, null);
            $count = count($parts);
            self::assertGreaterThan(0, $count, "name: '$suffix' words");
            self::assertLessThanOrEqual($wordLimit, $count, "name: $name for '$suffix' word limit hit ($wordLimit): $count");
            $verbs[$verb][$name] = $method;
            foreach ($parts as $word) {
                $words[$word][$name] = $method;
            }
            null === $prefix || $prefixes[$prefix][$name] = $method;
        }
        ksort($verbs);
        ksort($words);
        ksort($prefixes);

        return ['words' => $words, 'verbs' => $verbs, 'prefixes' => $prefixes];
    }

    /**
     * @return void
     */
    public function testApiVerbs(): void
    {
        $verbs = $this->testMethodNamingConvention()['verbs'];

        $expected = [
            'add', 'append',
            'copy', 'create',
            'delete', 'get', 'import',
            'list', 'ping', 'search',
            'update',
        ];
        $actual = array_keys($verbs);
        $actualNew = array_diff($actual, $expected);
        self::assertSame($expected, $actual, 'verbs: new (' . count($actualNew) . '): ' . implode(', ', $actualNew));
    }

    /**
     * The casing "DTable" is favored over
     * "Dtable" (lowercase "t" second character).
     *
     * @return void
     */
    public function testDTableCase(): void
    {
        /** @var array<string, array<string, ReflectionMethod>> $words */
        $words = $this->testMethodNamingConvention()['words'];
        $this->addToAssertionCount(1);

        if (isset($words['Dtable'])) {
            $methodNames = array_keys($words['Dtable']);
            $count = count($methodNames);
            $this->fail(sprintf('DTable naming violation in %d method%s: %s', $count, $count === 1 ? '' : 's', implode(', ', $methodNames)));
        }
    }

    /**
     * The term "dtable" is technical, "base" should be favored
     * in the public interface.
     *
     * @return void
     */
    public function testDTableWords(): void
    {
        /** @var array<string, ReflectionMethod> $methods */
        $methods = $this->testMethodNamingConvention()['words']['DTable'] ?? [];
        $this->addToAssertionCount(1);

        $methods = array_filter($methods, static function (ReflectionMethod $reflectionMethod) {
            $docComment = DocCommentSpy::from($reflectionMethod);
            // @deprecated since 0.1.15, use `SeaTableApi::addSystemNotificationToUser()`; {@see SeaTableApi::addSystemNotificationToUser}
            $deprecationPattern = '(^@deprecated since [0-9.]+, use `SeaTableApi::([a-zA-Z]+)\()';
            return !count($docComment->grep($deprecationPattern));
        });

        $upperLimit = 1;
        $count = count($methods);
        $message = "Methods ($count), non-deprecated, with the word 'DTable'\n - " . implode("\n - ", array_keys($methods));
        if ($upperLimit < $count) {
            $this->fail('a new method with the word "DTable" has been introduced: ' . $message);
        }
        if ($upperLimit === $count) {
            $this->markTestSkipped($message);
        }
        if (0 === $count) {
            // all renamed (implicit $lowerLimit is 0)
            $this->addToAssertionCount(1);
            return;
        }
        $this->fail('Consider to rename more methods with the word "DTable" in it: ' . $message);
    }

    /**
     * @return \Generator
     */
    public function provideApiMethodNames(): \Generator
    {
        foreach ($this->getPublicMethods() as $reflectionMethod) {
            $name = $reflectionMethod->name;
            yield $name => [$name];
        }
    }

    /**
     * getAView() -> getView()
     *
     * @dataProvider provideApiMethodNames()
     * @param string $methodName
     * @return void
     */
    public function testNotAnAInMethodName(string $methodName): void
    {
        $docComment = DocCommentSpy::createFromMethodName($methodName);

        // @deprecated since 0.1.15, use `SeaTableApi::addSystemNotificationToUser()`; {@see SeaTableApi::addSystemNotificationToUser}
        $deprecationPattern = PregPattern::fromString('(^@deprecated since [0-9.]+, use `SeaTableApi::([a-zA-Z]+)\()');
        $deprecations = $docComment->grep($deprecationPattern);
        $this->assertLessThanOrEqual(1, count($deprecations), 'there must be no more than one deprecation');

        $violationPattern = PregPattern::fromString('~[a-z]An?[A-Z]~');
        $methodNameViolates = $violationPattern->matchesString($methodName);
        $newName = null;
        $newNameViolates = true;
        if ($methodNameViolates && $deprecations->count()) {
            $newName = $deprecations->getMatchesAt(0)[1];
            $newNameViolates = $violationPattern->matchesString($newName);
        }

        $this->assertFalse($methodNameViolates && $newNameViolates, "$newName() <- $methodName()");
    }

    /**
     * api methods that are {@unfit} have deprecations
     *
     * @dataProvider provideApiMethodNames()
     * @param string $methodName
     * @return void
     */
    public function testUnfitMethodsAreDeprecated(string $methodName): void
    {
        $docComment = DocCommentSpy::createFromMethodName($methodName);
        $this->addToAssertionCount(1);
        if (false === strpos($docComment->getTitle(), '{@unfit}')) {
            return;
        }

        // @deprecated since 0.1.15, use `SeaTableApi::addSystemNotificationToUser()`; {@see SeaTableApi::addSystemNotificationToUser}
        $deprecationPattern = '(^@deprecated since [0-9.]+, use `SeaTableApi::([a-zA-Z]+)\()';
        $deprecations = $docComment->grep($deprecationPattern);
        if ($deprecations->count()) {
            $alternativeMethodName = $deprecations->getMatchesAt(0, 1);
            if (!empty($alternativeMethodName)) {
                return;
            }
        }

        $this->markTestSkipped("$methodName() is {@unfit}");
    }

    /**
     * if there are still @deprecated api-methods as within 0.2.x they
     * should be removed
     *
     * @param string $methodName
     *
     * @return void
     */
    public function testFor01xDeprecatedMethods(): void
    {
        $methodsMarkedForDeprecation = [];

        // @deprecated since 0.1.15, use `SeaTableApi::addSystemNotificationToUser()`; {@see SeaTableApi::addSystemNotificationToUser}
        $deprecationPattern = '(^@deprecated since 0\.1\.[0-9.]+, use `SeaTableApi::([a-zA-Z]+)\()';

        foreach ($this->getPublicMethods() as $publicMethod) {
            $deprecations = DocCommentSpy::from($publicMethod)->grep($deprecationPattern);
            $this->assertLessThanOrEqual(1, count($deprecations), 'there must be no more than one deprecation');

            if ($deprecations->has()) {
                $methodsMarkedForDeprecation[] = $publicMethod->getName();
            }
        }

        if (empty($methodsMarkedForDeprecation)) {
            return;
        }

        $count = count($methodsMarkedForDeprecation);
        if ($count === 0) {
            return;
        }
        $message = "Methods ($count), deprecated in 0.1.x:\n - " . implode("\n - ", $methodsMarkedForDeprecation);

        if ($count >= 18) { // if below, it's time to remove more.
            $this->markTestSkipped("Remove more deprecated methods for 0.2.x ($count)");
        }

        $this->fail('Consider to remove more deprecated methods for 0.2.x: ' . $message);
    }

    public function provideApiNonDeprecatedMethodParameters(): \Generator
    {
        foreach ($this->getPublicMethods() as $reflectionMethod) {
            if ($this->methodIsDeprecated($reflectionMethod)) {
                continue;
            }
            $parameters = $reflectionMethod->getParameters();
            $method = $reflectionMethod->name;
            foreach ($parameters as $index => $reflectionParameter) {
                $parameter = $reflectionParameter->name;
                yield "$method-$index-$parameter" => [$method, $index, $parameter];
            }
        }
    }

    /**
     * @dataProvider provideApiNonDeprecatedMethodParameters()
     * @param string $method
     * @param int $index
     * @param string $parameter
     * @return void
     */
    public function testParameterNames(string $method, int $index, string $parameter): void
    {
        $this->assertStringNotContainsString('_', $parameter);
    }

    public function provideApiReflectionMethods(): \Generator
    {
        foreach ($this->getPublicMethods() as $reflectionMethod) {
            $name = $reflectionMethod->name;
            yield $name => [$reflectionMethod];
        }
    }

    /**
     * @dataProvider provideApiReflectionMethods()
     * @param ReflectionMethod $reflectionMethod
     * @return void
     */
    public function testPagingParameterOrder(ReflectionMethod $reflectionMethod): void
    {
        $reflectionParameters = $reflectionMethod->getParameters();
        $this->addToAssertionCount(1);
        if (count($reflectionParameters) < 2) {
            return;
        }
        foreach ($reflectionParameters as $reflectionParameter) {
            $name = $reflectionParameter->name;
            $name === 'perPage' && $this->assertSame('page', $previous ?? null);
            $previous = $name;
        }
    }

    /**
     * return types are defined
     *
     * @dataProvider provideApiReflectionMethods()
     * @param ReflectionMethod $reflectionMethod
     * @return void
     */
    public function testMethodReturnTypeIsDefined(ReflectionMethod $reflectionMethod): void
    {
        if ($this->methodIsDeprecated($reflectionMethod)) {
            $this->addToAssertionCount(1);
            return;
        }

        $this->assertNotNull($reflectionMethod->getReturnType(), 'return type for ' . $reflectionMethod->getName());
    }

    public function provideApiNonDeprecatedMethodReflectionParameters(): \Generator
    {
        foreach ($this->getPublicMethods() as $reflectionMethod) {
            if ($this->methodIsDeprecated($reflectionMethod)) {
                continue;
            }
            $parameters = $reflectionMethod->getParameters();
            $method = $reflectionMethod->name;
            foreach ($parameters as $index => $reflectionParameter) {
                $parameter = $reflectionParameter->name;
                yield "$method-$index-$parameter" => [$reflectionParameter];
            }
        }
    }

    private function methodIsDeprecated(ReflectionMethod $reflectionMethod): bool
    {
        return DocCommentSpy::from($reflectionMethod)->matches('(^@deprecated since )');
    }

    /**
     * @dataProvider provideApiNonDeprecatedMethodReflectionParameters()
     * @param \ReflectionParameter $reflectionParameter
     * @return void
     */
    public function testParameterTypeIsDefined(\ReflectionParameter $reflectionParameter): void
    {
        $this->assertNotNull($reflectionParameter->getType(), 'parameter type');
    }

    private function getPrefix(string $methodName): ?string
    {
        foreach ($this->prefixes as $prefix) {
            if (0 === stripos($methodName, $prefix)) {
                return $prefix;
            }
        }

        return null;
    }

    /**
     * @dataProvider provideApiReflectionMethods()
     */
    public function testMethodDocblockHasGroup(ReflectionMethod $method): void
    {
        $docComment = DocCommentSpy::from($method);
        $hasGroup = $docComment->grep('(^@group (.*?)$)D')->has();
        $deprecated = $docComment->grep('(^@deprecated since (\d+\.\d+.\d+),)');

        // deprecated methods can be ignored
        if ($deprecated->has()) {
            $this->addToAssertionCount(1);
            return;
        }

        $this->assertTrue(
            $hasGroup,
            sprintf(
                'The method ->%s() has no @group annotation (prefix=%s)',
                $method->name,
                $this->getPrefix($method->name)
            )
        );
    }

    /**
     * @dataProvider provideApiReflectionMethods()
     */
    public function testMethodDocblockHasLink(ReflectionMethod $method): void
    {
        $docComment = DocCommentSpy::from($method);
        $linkPattern = '(^(?:@link (https://api\.seatable\.io/#)([a-z0-9-]+)$|@link {@pending /api/))D';
        $hasLink = $docComment->matches($linkPattern);

        $hasLinkOrIsDeprecated = $hasLink || $docComment->matches('(^@deprecated since )');

        $this->assertTrue($hasLinkOrIsDeprecated);
    }
}
