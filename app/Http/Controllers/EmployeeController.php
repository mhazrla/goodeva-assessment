<?php

namespace App\Http\Controllers;

use App\Charts\EmployeeBarChart;
use App\Charts\EmployeeDonutChart;
use App\Charts\EmployeeLineChart;
use App\Charts\EmployeePieChart;
use App\Exports\ExportEmployees;
use App\Imports\ImportEmployees;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('Employee/Index', compact('employees'));
    }

    public function chart(EmployeePieChart $pie, EmployeeLineChart $line, EmployeeBarChart $bar, EmployeeDonutChart $donut)
    {
        return view('Employee/Chart', ['pie' => $pie->build(), 'line' => $line->build(), 'bar' => $bar->build(), 'donut' => $donut->build()]);
    }

    public function export()
    {
        return Excel::download(new ExportEmployees, now() . '.xlsx');
    }

    public function import()
    {
        Excel::import(new ImportEmployees, request()->file('employees'));

        return back();
    }
}
