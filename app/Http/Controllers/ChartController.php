<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class ChartController extends Controller
{
    public function index()
    {

          $loggedUserId = logged_user()->id;

    $chart_options = [
        'chart_title'     => 'Minhas Vendas por Mês',
        'report_type'     => 'group_by_date',
        'model'           => 'App\Models\Transaction',
        'group_by_field'  => 'created_at',
        'group_by_period' => 'month',
        'chart_type'      => 'line',


        // Filtra vendas cujos produtos foram criados pelo usuário logado
        'where_raw'       => "product_id IN (SELECT id FROM products WHERE user_id = {$loggedUserId})",
    ];

        $chart = new LaravelChart($chart_options);

        return view('charts', compact('chart'));
    }

}
