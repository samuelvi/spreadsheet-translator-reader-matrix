<?php

/*
 * This file is part of the Atico/SpreadsheetTranslator package.
 *
 * (c) Samuel Vicent <samuelvicent@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Atico\SpreadsheetTranslator\Reader\Matrix;

use Atico\SpreadsheetTranslator\Core\Reader\AbstractArrayReader;
use Atico\SpreadsheetTranslator\Core\Reader\ReaderInterface;
use Atico\SpreadsheetTranslator\Core\Exception\SheetNameNotFoundException;

class MatrixReader extends AbstractArrayReader implements ReaderInterface
{
    function __construct(protected array $sheets)
    {
    }

    public function getSheets(): array
    {
        return $this->sheets;
    }

    public function getSheetNames(): array
    {
        return array_keys($this->sheets);
    }

    public function getData($sheet)
    {
        return $sheet;
    }

    /**
     * @throws SheetNameNotFoundException
     */
    public function getDataBySheetName($name)
    {
        if (!isset($this->sheets[$name])) {
            throw SheetNameNotFoundException::create($name);
        }
        return $this->sheets[$name];
    }

    public function getTitle($index)
    {
        return array_values($this->sheets)[$index];
    }
}