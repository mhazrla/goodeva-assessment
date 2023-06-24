<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEmployees implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Employee::get()->except(['created_at', 'updated_at']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array
    {
        return ["EEID", "Fullname", "Job Title", "Department", "Business Unit", "Gender", "Ethnicity", "Age", "Salary", "Bonus", "Country", "City"];
    }
}
