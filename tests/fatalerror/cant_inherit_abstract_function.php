<?php

interface TestInterface
{
    public function testMethod();
}

interface TestInterface2
{
    public function testMethod();
}

class TestClass implements TestInterface, TestInterface2
{

}
