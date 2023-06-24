<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportEmployees implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Employee([
            'id' => $row[0],
            'fullname' => $row[1],
            'title' => $row[2],
            'department' => $row[3],
            'businessUnit' => $row[4],
            'gender' => $row[5],
            'ethnicity' => $row[6],
            'age' => $row[7],
            'salary' => $row[9],
            'bonus' => $row[10],
            'country' => $row[11],
            'city' => $row[12],
        ]);
    }
}
