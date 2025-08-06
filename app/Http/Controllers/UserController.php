<!-- <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\Product;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
// use LaravelDaily\LaravelCharts\Classes\LaravelChart;

// use Illuminate\Support\Facades\Auth;


// class UserController extends Controller
// {
//     public function index()
//     {

//             $chart_options = [
//         'chart_title' => 'Categorias de Produtos',
//         'report_type' => 'group_by_string',
//         'model' => Product::class,
//         'group_by_field' => 'category',
//         'chart_type' => 'bar',
//         'top_results' => 5,
//         'chart_color' => '160, 32, 240',
//         'chart_height'     => '200px',
//         ];

//         $chart1 = new LaravelChart($chart_options);

//         return view('admin.userTable', compact('chart1'));
//     }

// } 
