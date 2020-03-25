<?php

namespace DPostInter\Interfaces;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

interface ISheetRenderer
{
    /**
     * @param Spreadsheet $spreadSheet
     */
    public function prepare(Spreadsheet $spreadSheet): void;

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function addHeaders(Spreadsheet $spreadSheet): void;

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function addRows(Spreadsheet $spreadSheet): void;

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function finalise(Spreadsheet $spreadSheet): void;
}