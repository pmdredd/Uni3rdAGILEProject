<?php

use PHPUnit\Framework\TestCase;
require_once 'grades/grade_functions.php';

/**
 * Class GradesTest
 */
final class SubmissionsTest extends TestCase {

    /**
    * Test upper and lower mark bounds of each grade 
    * e.g. A2 can only be returned if mark is between 94 and 89
    */
    public function testCalculateGrade() {
        $this->assertEquals('A1', calculateGrade(100));
        $this->assertEquals('A1', calculateGrade(95));
        $this->assertEquals('A2', calculateGrade(94));
        $this->assertEquals('A2', calculateGrade(89));
        $this->assertEquals('A3', calculateGrade(88));
        $this->assertEquals('A3', calculateGrade(83));
        $this->assertEquals('A4', calculateGrade(82));
        $this->assertEquals('A4', calculateGrade(76));
        $this->assertEquals('A5', calculateGrade(75));
        $this->assertEquals('A5', calculateGrade(70));

        $this->assertEquals('B1', calculateGrade(69));
        $this->assertEquals('B1', calculateGrade(67));
        $this->assertEquals('B2', calculateGrade(66));
        $this->assertEquals('B2', calculateGrade(64));
        $this->assertEquals('B3', calculateGrade(63));
        $this->assertEquals('B3', calculateGrade(60));

        $this->assertEquals('C1', calculateGrade(59));
        $this->assertEquals('C1', calculateGrade(57));
        $this->assertEquals('C2', calculateGrade(56));
        $this->assertEquals('C2', calculateGrade(54));
        $this->assertEquals('C3', calculateGrade(53));
        $this->assertEquals('C3', calculateGrade(50));

        $this->assertEquals('D1', calculateGrade(49));
        $this->assertEquals('D1', calculateGrade(47));
        $this->assertEquals('D2', calculateGrade(46));
        $this->assertEquals('D2', calculateGrade(44));
        $this->assertEquals('D3', calculateGrade(43));
        $this->assertEquals('D3', calculateGrade(40));

        $this->assertEquals('MF1', calculateGrade(39));
        $this->assertEquals('MF1', calculateGrade(37));
        $this->assertEquals('MF2', calculateGrade(36));
        $this->assertEquals('MF2', calculateGrade(34));
        $this->assertEquals('MF3', calculateGrade(33));
        $this->assertEquals('MF3', calculateGrade(30));

        $this->assertEquals('CF', calculateGrade(29));
        $this->assertEquals('CF', calculateGrade(20));
        $this->assertEquals('BF', calculateGrade(19));
        $this->assertEquals('BF', calculateGrade(0));

    }

}