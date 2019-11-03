<?php

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testAddition()
    {
        include('example.php');
        $this->assertSame(2, add(1,1));
    }
}