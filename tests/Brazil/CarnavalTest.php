<?php
/**
 *  This file is part of the Yasumi package.
 *
 *  Copyright (c) 2015 - 2016 AzuyaLabs
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author Dorian Neto <doriansampaioneto@gmail.com>
 */

namespace Yasumi\Tests\Brazil;

use DateTime;
use DateInterval;
use Yasumi\Provider\ChristianHolidays;

/**
 * Class for testing Carnaval in the Brazil.
 */
class CarnavalTest extends BrazilBaseTestCase
{
    use ChristianHolidays;

    /**
     * The name of the holiday
     */
    const HOLIDAY = 'carnaval';

    /**
     * The year in which the holiday was first established
     */
    const ESTABLISHMENT_YEAR = 1700;

    /**
     * Tests Carnaval on or after 1700.
     */
    public function testCarnavalAfter1700()
    {
        $year = $this->generateRandomYear(self::ESTABLISHMENT_YEAR);
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year,
            $this->calculateEaster($year, self::TIMEZONE)->sub(new DateInterval('P47D')));
    }

    /**
     * Tests Carnaval on or before 1700.
     */
    public function testCarnavalBefore1700()
    {
        $year = $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR-1);
        $this->assertNotHoliday(self::REGION, self::HOLIDAY, $year, 
            $this->calculateEaster($year, self::TIMEZONE)->sub(new DateInterval('P47D')));
    }
}