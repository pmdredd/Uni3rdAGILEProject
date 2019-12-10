<?php

use PHPUnit\Framework\TestCase;
require_once 'grades/grade_functions.php';

/**
 * Class GradesTest
 */
final class GradesTest extends TestCase {

    /**
    * Test upper and lower mark bounds of each grade for first Submissions
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

    /**
     * Test upper and lower mark bounds of each grade for second Submissions
     * e.g. A2 can only be returned if mark is between 94 and 89
     */
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

    /**
     * Test that the function returns the correct Grade Primary Key in the db for each Grade value
     */
    public function testGetGradeIdByGrade() {
        $this->assertEquals(17, getGradeId("A1"));
        $this->assertEquals(16, getGradeId("A2"));
        $this->assertEquals(15, getGradeId("A3"));
        $this->assertEquals(14, getGradeId("A4"));
        $this->assertEquals(13, getGradeId("A5"));
        $this->assertEquals(12, getGradeId("B1"));
        $this->assertEquals(11, getGradeId("B2"));
        $this->assertEquals(10, getGradeId("B3"));
        $this->assertEquals(9, getGradeId("C1"));
        $this->assertEquals(8, getGradeId("C2"));
        $this->assertEquals(7, getGradeId("C3"));
        $this->assertEquals(6, getGradeId("D1"));
        $this->assertEquals(5, getGradeId("D2"));
        $this->assertEquals(4, getGradeId("D3"));
        $this->assertEquals(3, getGradeId("MF"));
        $this->assertEquals(2, getGradeId("CF"));
        $this->assertEquals(1, getGradeId("BF"));
    }

    /**
     * Test that the function returns the correct Grade value for each Grade Primary Key in the db
     */
    public function testGetGradeByGradeId() {
        $this->assertEquals("A1", getGrade(17));
        $this->assertEquals("A2", getGrade(16));
        $this->assertEquals("A3", getGrade(15));
        $this->assertEquals("A4", getGrade(14));
        $this->assertEquals("A5", getGrade(13));
        $this->assertEquals("B1", getGrade(12));
        $this->assertEquals("B2", getGrade(11));
        $this->assertEquals("B3", getGrade(10));
        $this->assertEquals("C1", getGrade(9));
        $this->assertEquals("C2", getGrade(8));
        $this->assertEquals("C3", getGrade(7));
        $this->assertEquals("D1", getGrade(6));
        $this->assertEquals("D2", getGrade(5));
        $this->assertEquals("D3", getGrade(4));
        $this->assertEquals("MF", getGrade(3));
        $this->assertEquals("CF", getGrade(2));
        $this->assertEquals("BF", getGrade(1));
    }

    public function testCalculateLateness() {
        $this->assertEquals(1, calculateLateness("2019-12-13", "2019-12-12"));
        $this->assertEquals(2, calculateLateness("2019-12-14", "2019-12-12"));
        $this->assertEquals(3, calculateLateness("2019-12-15", "2019-12-12"));
        $this->assertEquals(4, calculateLateness("2019-12-16", "2019-12-12"));
        $this->assertEquals(5, calculateLateness("2019-12-17", "2019-12-12"));
    }

    public function testApplyLatePenalty() {
        $this->assertEquals(1, applyLatePenalty(17, 6));
        $this->assertEquals(12, applyLatePenalty(17, 5));
        $this->assertEquals(13, applyLatePenalty(17, 4));
        $this->assertEquals(14, applyLatePenalty(17, 3));
        $this->assertEquals(15, applyLatePenalty(17, 2));
        $this->assertEquals(16, applyLatePenalty(17, 1));
    }
}
