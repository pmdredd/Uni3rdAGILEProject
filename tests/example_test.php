<?php

use PHPUnit\Framework\TestCase;
include 'example.php';

final class ExampleTest extends TestCase
{
    public function testAddition()
    {
        $this->assertSame(2, add(1,1));
    }

    public function testAllStudentsReturnsRecords()
    {
        $students = getAllStudents();
        $this->assertNotEmpty($students);
    }
}
