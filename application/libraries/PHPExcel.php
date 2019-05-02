<?php

use PhpOffice\PhpSpreadsheet\Reader\Csv;

class PHPExcel extends CSV
{
    function read_csv($file, $separator = ';'): array
    {
        if($separator)
            $this->setDelimiter($separator);

        $csv = $this->load($file);
        $sheet = $csv->getActiveSheet()->getRowIterator();

        $numrow = 1;

        foreach($sheet as $row)
        {
            if($numrow > 1)
            {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $cells = [];

                foreach($cellIterator as $rows)
                    array_push($cells, $rows->getValue());
            }
            
            $numrow++;
        }

        return $cells;
    }
}