<?php

namespace App\Charts;

use App\Models\Employee;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EmployeePieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $department = Employee::get();
        $data = [
            $department->where('department', 'IT')->count(),
            $department->where('department', 'Finance')->count(),
            $department->where('department', 'Sales')->count(),
            $department->where('department', 'Accounting')->count(),
            $department->where('department', 'Human Resources')->count(),
            $department->where('department', 'Engineering')->count(),
            $department->where('department', 'Marketing')->count(),
        ];
        $labels = [
            'IT', 'Finance', 'Sales', 'Accounting', 'Human Resources', 'Engineering', 'Marketing'
        ];
        return $this->chart->pieChart()
            ->setTitle('Total Employees in each department')
            ->setSubtitle('Season ' . date('Y'))
            ->addData($data)
            ->setLabels($labels);
    }
}
