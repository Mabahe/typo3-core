<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\Core\Tests\Unit\Context;

use TYPO3\CMS\Core\Context\DateTimeAspect;
use TYPO3\CMS\Core\Context\Exception\AspectPropertyNotFoundException;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class DateTimeAspectTest extends UnitTestCase
{
    /**
     * @test
     */
    public function getDateTimeReturnsSameObject(): void
    {
        $dateObject = new \DateTimeImmutable('2018-07-15', new \DateTimeZone('Europe/Moscow'));
        $subject = new DateTimeAspect($dateObject);
        $result = $subject->getDateTime();
        self::assertSame($dateObject, $result);
    }

    /**
     * @test
     */
    public function getThrowsExceptionOnInvalidArgument(): void
    {
        $this->expectException(AspectPropertyNotFoundException::class);
        $this->expectExceptionCode(1527778767);
        $dateObject = new \DateTimeImmutable('2018-07-15', new \DateTimeZone('Europe/Moscow'));
        $subject = new DateTimeAspect($dateObject);
        $subject->get('football');
    }

    /**
     * @test
     */
    public function getTimestampReturnsInteger(): void
    {
        $dateObject = new \DateTimeImmutable('2018-07-15', new \DateTimeZone('Europe/Moscow'));
        $subject = new DateTimeAspect($dateObject);
        $timestamp = $subject->get('timestamp');
        self::assertIsInt($timestamp);
    }

    /**
     * @test
     */
    public function getTimezoneReturnsUtcTimezoneOffsetWhenDateTimeIsInitializedFromUnixTimestamp(): void
    {
        $dateObject = new \DateTimeImmutable('@12345');
        $subject = new DateTimeAspect($dateObject);
        self::assertSame('+00:00', $subject->get('timezone'));
    }

    /**
     * @test
     */
    public function getTimezoneReturnsGivenTimezoneOffsetWhenDateTimeIsInitializedFromIso8601Date(): void
    {
        $dateObject = new \DateTimeImmutable('2004-02-12T15:19:21+05:00');
        $subject = new DateTimeAspect($dateObject);
        self::assertSame('+05:00', $subject->get('timezone'));
    }

    /**
     * @return array
     */
    public function dateFormatValuesDataProvider(): array
    {
        return [
            'timestamp' => [
                'timestamp',
                1531648805,
            ],
            'iso' => [
                'iso',
                '2018-07-15T13:00:05+03:00',
            ],
            'timezone' => [
                'timezone',
                'Europe/Moscow',
            ],
            'full' => [
                'full',
                new \DateTimeImmutable('2018-07-15T13:00:05', new \DateTimeZone('Europe/Moscow')),
            ],
            'accessTime' => [
                'accessTime',
                1531648800,
            ],
        ];
    }

    /**
     * @test
     * @dataProvider dateFormatValuesDataProvider
     * @param string $key
     * @param string $expectedResult
     */
    public function getReturnsValidInformationFromProperty($key, $expectedResult): void
    {
        $dateObject = new \DateTimeImmutable('2018-07-15T13:00:05', new \DateTimeZone('Europe/Moscow'));
        $subject = new DateTimeAspect($dateObject);
        self::assertEquals($expectedResult, $subject->get($key));
    }
}
