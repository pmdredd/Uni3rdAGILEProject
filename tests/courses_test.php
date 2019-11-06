<?php

use PHPUnit\Framework\TestCase;
include 'all_courses.php';

final class ExampleTest extends TestCase
{
    public function testAllStudentsReturnsRecords()
    {
        $students = getAllStudents();
        $this->assertNotEmpty($students);
    }
}
