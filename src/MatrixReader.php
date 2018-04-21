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
use Atico\SpreadsheetTranslator\Core\Exception\SheetNameNotFound;

class MatrixReader extends AbstractArrayReader implements ReaderInterface
{
    /** @var $array $sheets */
    protected $sheets;

    function __construct($array)
    {
        $this->sheets = $array;
    }

    public function getSheets()
    {
        return $this->sheets;
    }

    public function getTitle($index)
    {
        return array_values($this->sheets)[$index];
    }

    public function getData($sheet)
    {
        return $sheet;
    }

    /**
     * @throws SheetNameNotFound
     */
    public function getDataBySheetName($name)
    {
        if (!isset($this->sheets[$name])) {
            throw SheetNameNotFound::create($name);
        }
        return $this->sheets[$name];
    }
}