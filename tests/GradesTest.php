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

    public function testGetGradeIdByGrade() {
        $this->assertEquals(17, getGradeIdByGrade("A1"));
        $this->assertEquals(16, getGradeIdByGrade("A2"));
        $this->assertEquals(15, getGradeIdByGrade("A3"));
        $this->assertEquals(14, getGradeIdByGrade("A4"));
        $this->assertEquals(13, getGradeIdByGrade("A5"));
        $this->assertEquals(12, getGradeIdByGrade("B1"));
        $this->assertEquals(11, getGradeIdByGrade("B2"));
        $this->assertEquals(10, getGradeIdByGrade("B3"));
        $this->assertEquals(9, getGradeIdByGrade("C1"));
        $this->assertEquals(8, getGradeIdByGrade("C2"));
        $this->assertEquals(7, getGradeIdByGrade("C3"));
        $this->assertEquals(6, getGradeIdByGrade("D1"));
        $this->assertEquals(5, getGradeIdByGrade("D2"));
        $this->assertEquals(4, getGradeIdByGrade("D3"));
        $this->assertEquals(3, getGradeIdByGrade("MF"));
        $this->assertEquals(2, getGradeIdByGrade("CF"));
        $this->assertEquals(1, getGradeIdByGrade("BF"));
    }

    public function testGetGradeByGradeId() {
        $this->assertEquals("A1", getGradeByGradeId(17));
        $this->assertEquals("A2", getGradeByGradeId(16));
        $this->assertEquals("A3", getGradeByGradeId(15));
        $this->assertEquals("A4", getGradeByGradeId(14));
        $this->assertEquals("A5", getGradeByGradeId(13));
        $this->assertEquals("B1", getGradeByGradeId(12));
        $this->assertEquals("B2", getGradeByGradeId(11));
        $this->assertEquals("B3", getGradeByGradeId(10));
        $this->assertEquals("C1", getGradeByGradeId(9));
        $this->assertEquals("C2", getGradeByGradeId(8));
        $this->assertEquals("C3", getGradeByGradeId(7));
        $this->assertEquals("D1", getGradeByGradeId(6));
        $this->assertEquals("D2", getGradeByGradeId(5));
        $this->assertEquals("D3", getGradeByGradeId(4));
        $this->assertEquals("MF", getGradeByGradeId(3));
        $this->assertEquals("CF", getGradeByGradeId(2));
        $this->assertEquals("BF", getGradeByGradeId(1));
    }

}
