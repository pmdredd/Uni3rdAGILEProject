<?php

use PHPUnit\Framework\TestCase;
require_once 'grades/grade_functions.php';

/**
 * Class GradesTest
 */
final class SubmissionsTest extends TestCase {

    public function testCalculateGrade() {
        $this->assertEquals('A1', calculateGrade(100));
        $this->assertEquals('A1', calculateGrade(95));
    }

}