<?php

namespace Lunkkun\RobotNames\Tests;

use Lunkkun\RobotNames\Generator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function testGenerates() {
        $generator = new Generator([
            str_split('ABC'),
            range(0, 2),
        ]);

        $results = iterator_to_array($generator);
        sort($results);
        $this->assertEquals([
            'A0',
            'A1',
            'A2',
            'B0',
            'B1',
            'B2',
            'C0',
            'C1',
            'C2',
        ], $results);
    }
}
