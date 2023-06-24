<?php

namespace App\Charts;

use App\Models\Employee;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EmployeeBarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $usEmployees = Employee::where('country', 'United States')->get();
        $chinaEmployees = Employee::where('country', 'China')->get();
        $brazilEmployees = Employee::where('country', 'Brazil')->get();

        return $this->chart->barChart()
            ->setTitle("Total Employees's country in 2023")
            ->addData('US', [count($usEmployees)])
            ->addData('CH', [count($chinaEmployees)])
            ->addData('BR', [count($brazilEmployees)])
            ->setXAxis(['']);
    }
}
