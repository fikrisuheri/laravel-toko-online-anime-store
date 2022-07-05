<?php

namespace App\Charts;

use App\Models\Feature\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class OrderChartPie
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $order = Order::select(
            DB::raw("(count(id)) as total"),
            DB::raw("status"))
            ->whereYear('created_at',date('Y'))
            ->groupBy('status')
            ->get();
        $status_name = json_decode(json_encode($order->pluck('status_name_text')), true);
        $total = json_decode(json_encode($order->pluck('total')), true);
        return $this->chart->donutChart()
            ->setTitle('Diagram Transaksi.')
            ->setSubtitle('Tahun ' . Date('Y'))
            ->addData($total)
            ->setLabels($status_name);
    }
}
