<?php

namespace Atico\SpreadsheetTranslator\Reader\Matrix\Tests;

use Atico\SpreadsheetTranslator\Reader\Matrix\MatrixReader;
use PHPUnit\Framework\TestCase;

class MatrixReaderTest extends TestCase
{
    public function testGetDataBySheetName(): void
    {
        $sheets = [
            'Sheet1' => [
                ['a', 'b', 'c'],
                ['d', 'e', 'f'],
            ],
        ];

        $reader = new MatrixReader($sheets);

        $this->assertEquals($sheets['Sheet1'], $reader->getDataBySheetName('Sheet1'));
    }
}
