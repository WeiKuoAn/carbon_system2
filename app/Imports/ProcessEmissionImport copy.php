<?php

namespace App\Imports;

use App\Models\ProcessEmission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ProcessEmissionImport implements ToModel, WithMultipleSheets, WithMappedCells, WithEvents
{
    public function mapping(): array
    {
        return [
            'B5',  // Just map the cell, without giving it a specific name
        ];
    }

    public function model(array $row)
    {
        dd($row);
        return new ProcessEmission([
            'process_code' => $row['B5'],  // Access the value directly using the cell reference
        ]);
    }

    public function sheets(): array
    {
        return [
            '表五' => $this,
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function(BeforeImport $event) {
                $sheet = $event->reader->getSheetByName('表五');  // Assuming you want to process '表五'
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                // Convert formulas to their calculated values and then to text
                for ($row = 1; $row <= $highestRow; $row++) {
                    for ($col = 'A'; $col <= $highestColumn; $col++) {
                        $cell = $sheet->getCell($col . $row);
                        if ($cell->isFormula()) {
                            $calculatedValue = $cell->getCalculatedValue();
                            $cell->setValueExplicit(strval($calculatedValue), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                        }
                    }
                }
            }
        ];
    }

    class ProcessEmissionImport implements ToModel
    {
        public function startRow(): int
        {
            return 2;
        }

        public function model(array $row)
        {
            // dd($row);
            return new ProcessEmission([
                'process_code' => $row[1],
                'equipment_code' => $row[3],
                'fuel_name' => $row[7]
            ]);
        }


    }


}


