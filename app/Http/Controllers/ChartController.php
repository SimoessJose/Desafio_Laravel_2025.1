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
        //Produtos Cadastrados por Mes
        $chart_options = [
        'chart_title'        => 'Produtos Cadastrados por Mes',
        'model'              => Product::class,  
        'chart_type'         => 'pie',                       
        'report_type'        => 'group_by_date',                
        'group_by_field'     => 'created_at',                    
        'group_by_period'    => 'month',
        'top_results'        => 5,
        'chart_color'         => '0,122,255',               
        ];

        $chart = new LaravelChart($chart_options);

        return view('charts', compact('chart'));
    }

}
