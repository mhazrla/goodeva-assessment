<?php

namespace App\Http\Controllers;

use App\Charts\EmployeeBarChart;
use App\Charts\EmployeeDonutChart;
use App\Charts\EmployeeLineChart;
use App\Charts\EmployeePieChart;
use App\Exports\ExportEmployees;
use App\Imports\ImportEmployees;
use App\Models\Employee;
use ConsoleTVs\Charts\Charts;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(15);
        return view('Employee/Index', compact('employees'));
    }

    public function chart(EmployeePieChart $pie, EmployeeLineChart $line, EmployeeBarChart $bar, EmployeeDonutChart $donut)
    {
        $gauge = Charts::realtime(route('dummy-data'), 1000, 'gauge', 'google')
            ->setResponsive(false)
            ->setHeight(300)
            ->setWidth(0)
            ->setTitle("Random Data Generator")
            ->setMaxValues(100);

        return view('Employee/Chart', ['pie' => $pie->build(), 'line' => $line->build(), 'bar' => $bar->build(), 'donut' => $donut->build(), 'gauge' => $gauge]);
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

    public function exportPDF()
    {
        $employees = Employee::get();
        view()->share('employee', $employees);
        $pdf = PDF::loadView('Employee/PDF', ['employees' => $employees]);
        // download PDF file with download method
        return $pdf->download(time() . '- Employee Data.pdf');
    }
}
