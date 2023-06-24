<?php

namespace App\Charts;

use App\Models\Employee;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EmployeeDonutChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $blackEmployees = Employee::where('ethnicity', 'Black')->get()->count();
        $asianEmployees = Employee::where('ethnicity', 'Asian')->get()->count();
        $caucasianEmployees = Employee::where('ethnicity', 'Caucasian')->get()->count();
        $latinoEmployees = Employee::where('ethnicity', 'Latino')->get()->count();

        return $this->chart->donutChart()
            ->setTitle("Total Employee's Ethnicity in Company")
            ->setSubtitle('Season ' . date('Y'))
            ->addData([$blackEmployees, $asianEmployees, $caucasianEmployees, $latinoEmployees])
            ->setLabels(['Black', 'Asian', 'Caucasian', 'Latino']);
    }
}
