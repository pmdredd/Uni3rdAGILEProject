<?php

use PHPUnit\Framework\TestCase;
require_once 'grades/grade_functions.php';

/**
 * Class GradesTest
 */
final class GradesTest extends TestCase {

    /**
    * Test upper and lower mark bounds of each grade 
    * e.g. A2 can only be returned if mark is between 94 and 89
    */
    public function testCalculateGradeFirstSubmission() {
        // out of bounds should return false
        $this->assertFalse(calculateGrade(101, false));
        $this->assertFalse(calculateGrade(-1, false));

        $this->assertEquals('A1', calculateGrade(100, false));
        $this->assertEquals('A1', calculateGrade(95, false));
        $this->assertEquals('A2', calculateGrade(94, false));
        $this->assertEquals('A2', calculateGrade(89, false));
        $this->assertEquals('A3', calculateGrade(88, false));
        $this->assertEquals('A3', calculateGrade(83, false));
        $this->assertEquals('A4', calculateGrade(82, false));
        $this->assertEquals('A4', calculateGrade(76, false));
        $this->assertEquals('A5', calculateGrade(75, false));
        $this->assertEquals('A5', calculateGrade(70, false));

        $this->assertEquals('B1', calculateGrade(69, false));
        $this->assertEquals('B1', calculateGrade(67, false));
        $this->assertEquals('B2', calculateGrade(66, false));
        $this->assertEquals('B2', calculateGrade(64, false));
        $this->assertEquals('B3', calculateGrade(63, false));
        $this->assertEquals('B3', calculateGrade(60, false));

        $this->assertEquals('C1', calculateGrade(59, false));
        $this->assertEquals('C1', calculateGrade(57, false));
        $this->assertEquals('C2', calculateGrade(56, false));
        $this->assertEquals('C2', calculateGrade(54, false));
        $this->assertEquals('C3', calculateGrade(53, false));
        $this->assertEquals('C3', calculateGrade(50, false));

        $this->assertEquals('D1', calculateGrade(49, false));
        $this->assertEquals('D1', calculateGrade(47, false));
        $this->assertEquals('D2', calculateGrade(46, false));
        $this->assertEquals('D2', calculateGrade(44, false));
        $this->assertEquals('D3', calculateGrade(43, false));
        $this->assertEquals('D3', calculateGrade(40, false));

        $this->assertEquals('MF1', calculateGrade(39, false));
        $this->assertEquals('MF1', calculateGrade(37, false));
        $this->assertEquals('MF2', calculateGrade(36, false));
        $this->assertEquals('MF2', calculateGrade(34, false));
        $this->assertEquals('MF3', calculateGrade(33, false));
        $this->assertEquals('MF3', calculateGrade(30, false));

        $this->assertEquals('CF', calculateGrade(29, false));
        $this->assertEquals('CF', calculateGrade(20, false));
        $this->assertEquals('BF', calculateGrade(19, false));
        $this->assertEquals('BF', calculateGrade(0, false));    
    }

    public function testCalculateGradeSecondSubmission() {
        // out of bounds should return false
        $this->assertFalse(calculateGrade(101, true));
        $this->assertFalse(calculateGrade(-1, false));

        $this->assertEquals('D3', calculateGrade(100, true));
        $this->assertEquals('D3', calculateGrade(40, true));

        $this->assertEquals('MF1', calculateGrade(39, true));
        $this->assertEquals('MF1', calculateGrade(37, true));
        $this->assertEquals('MF2', calculateGrade(36, true));
        $this->assertEquals('MF2', calculateGrade(34, true));
        $this->assertEquals('MF3', calculateGrade(33, true));
        $this->assertEquals('MF3', calculateGrade(30, true));

        $this->assertEquals('CF', calculateGrade(29, true));
        $this->assertEquals('CF', calculateGrade(20, true));
        $this->assertEquals('BF', calculateGrade(19, true));
        $this->assertEquals('BF', calculateGrade(0, true));

    }

    public function testGradeMapping() {
        $this->assertSame(17, getGradeMapping("A1"));
        $this->assertSame(16, getGradeMapping("A2"));
        $this->assertSame(15, getGradeMapping("A3"));
        $this->assertSame(14, getGradeMapping("A4"));
        $this->assertSame(13, getGradeMapping("A5"));
        $this->assertSame(12, getGradeMapping("B1"));
        $this->assertSame(11, getGradeMapping("B2"));
        $this->assertSame(10, getGradeMapping("B3"));
        $this->assertSame(9, getGradeMapping("C1"));
        $this->assertSame(8, getGradeMapping("C2"));
        $this->assertSame(7, getGradeMapping("C3"));
        $this->assertSame(6, getGradeMapping("D1"));
        $this->assertSame(5, getGradeMapping("D2"));
        $this->assertSame(4, getGradeMapping("D3"));
        $this->assertSame(3, getGradeMapping("MF"));
        $this->assertSame(2, getGradeMapping("CF"));
        $this->assertSame(1, getGradeMapping("BF"));
    }

}
