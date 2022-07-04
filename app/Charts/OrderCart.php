<?php

namespace App\Charts;

use App\Models\Feature\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderCart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $order = Order::select(
            DB::raw("(count(id)) as total"),
            DB::raw("(DATE_FORMAT(created_at, '%D %M')) as month_name"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m %Y')"))
            ->get();
        $month_name = json_decode(json_encode($order->pluck('month_name')), true);
        $total = json_decode(json_encode($order->pluck('total')), true);
       return  $this->chart->lineChart()
            ->setTitle('Penjualan Tahun Ini')
            ->addData('Penjualan',$total)
            ->setXAxis($month_name);
            
    }
}
