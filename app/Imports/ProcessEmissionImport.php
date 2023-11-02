<?php

namespace App\Imports;

use App\Models\ProcessEmission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use App\Models\ProcessData;

class ProcessEmissionImport implements ToModel, WithStartRow
    {
        public function model(array $row)
        {
            $ProcessData = ProcessData::orderBy('id', 'desc')->first();

            return new ProcessEmission([
                'process_emission_id' => $ProcessData->id, // 获取 ProcessData 记录的 ID
                'process_code' => $row[1],
                'equipment_code' => $row[3],
                'fuel_name' => $row[6],
                'single_source_emission_total' => $row[45],
                'single_source_percentage' => $row[47],
            ]);
        }

        // 加入以下方法來指定開始的列
        public function startRow(): int
        {
            return 2;
        }

    }



