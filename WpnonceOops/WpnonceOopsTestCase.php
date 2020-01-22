<?php
namespace WpnonceOops;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;

class InpsydeTestCase extends TestCase {

    protected function setUp() {
        parent::setUp();
        Monkey\setUp();
    }

    protected function tearDown() {
        Monkey\tearDown();
        parent::tearDown();
    }
}

