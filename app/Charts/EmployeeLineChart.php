<?php

namespace App\Charts;

use App\Models\Employee;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class EmployeeLineChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $itEmployees = Employee::where('department', 'IT')->take(12)->get();
        $financeEmployees = Employee::where('department', 'Finance')->take(12)->get();

        foreach ($itEmployees as $dev) {
            $itSalary[] = $dev->salary;
        }

        foreach ($financeEmployees as $finance) {
            $financeSalary[] = $finance->salary;
        }

        return $this->chart->lineChart()
            ->setTitle('Top 12 Salary')
            ->setSubtitle('IT vs Finance')
            ->addData('IT', $itSalary)
            ->addData('Finance', $financeSalary)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'August', 'September', 'October', 'November', 'December']);
    }
}
