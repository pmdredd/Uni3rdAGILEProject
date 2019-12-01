<?php

use PHPUnit\Framework\TestCase;
require_once 'grades/grade_functions.php';

/**
 * Class GradesTest
 */
final class SubmissionsTest extends TestCase {

    public function testCalculateGrade() {
        $this->assertTrue(calculateGrade());
    }

}