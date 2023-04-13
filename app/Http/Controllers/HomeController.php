<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\Resturant;
use App\Models\Resturant_branch;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $date = now()->format('Y-m-d');


        if ($request->input('report_month') != '') {
            $start_date = Carbon::now()->format('Y-m') . '-01';
            $end_date = Carbon::now()->format('Y-m') . '-30';
            $report = Resturant_branch::selectRaw('count(id) AS quantity, DAY(start_date) AS day')
                ->whereBetween('start_date', [$start_date, $end_date])
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get();

            $report_unregister_customer = DB::select("SELECT month, COUNT(MONTH) quantity FROM (SELECT DISTINCT (customer), DAY(DATE) AS MONTH FROM `orders` WHERE `date` BETWEEN '" . $start_date . "' AND '" . $end_date . "' GROUP BY customer ORDER BY `month` ASC) unregistercustomer GROUP BY month");

            $ruc = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            foreach ($report_unregister_customer as $r){
                $ruc[$r->month - 1] = $r->quantity;
            }

            $ra = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            foreach ($report as $r){
                $ra[$r->day - 1] = $r->quantity;
            }

            $report_unregister_customer = $ruc;
            $report = $ra;

        } else {
            $start_date = Carbon::now()->format('Y') . '-01-01';
            $end_date = Carbon::now()->format('Y') . '-12-30';
            $report = Resturant_branch::selectRaw('count(id) AS quantity, MONTH(start_date) AS month')
                ->whereBetween('start_date', [$start_date, $end_date])
                ->groupBy('month')
                ->orderBy('month', 'ASC')
                ->get();

            $report_unregister_customer = DB::select("SELECT month, COUNT(MONTH) quantity FROM (SELECT DISTINCT (customer), MONTH(DATE) AS MONTH FROM `orders` WHERE `date` BETWEEN '" . $start_date . "' AND '" . $end_date . "' GROUP BY customer ORDER BY `month` ASC) unregistercustomer GROUP BY month");


            $ruc = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',);
            foreach ($report_unregister_customer as $r){
                $ruc[$r->month - 1] = $r->quantity;
            }

            $ra = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',);
            foreach ($report as $r){
                $ra[$r->month - 1] = $r->quantity;
            }

            $report_unregister_customer = $ruc;
            $report = $ra;

        }


        $resturant_count = Resturant_branch::count('id');


        $register_customer = '0';


        $unregister_customer = Order::selectRaw('customer, count(id) AS total_order')
            ->groupBy('customer')->get();


        return view('home', compact('resturant_count', 'register_customer', 'unregister_customer', 'report', 'report_unregister_customer'));
    }

    public function dashboard(Request $request)
    {
        $resturant_id = auth()->user()->resturant_branch->resturant_id;
        $branch_id = auth()->user()->resturant_branch->id;

        $date = now()->format('Y-m-d');


        if ($request->input('report_week') != '') {
            $previous_date = Carbon::now()->addDays('-7')->format('Y-m-d');

            $report = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->selectRaw('SUM(quantity) AS quantity, WEEK(date) AS week')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$previous_date, $date])
                ->where('branch_id', $branch_id)
                ->groupBy('week')
                ->orderBy('week', 'ASC')
                ->get();

            $ra = array('0', '0', '0', '0', '0', '0', '0');
            foreach ($report as $r){
                $ra[$r->week - 1] = $r->quantity;
            }
            $report = $ra;

        } else if ($request->input('report_month') != '') {
            $previous_date = Carbon::now()->addDays('-30')->format('Y-m-d');

            $report = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->selectRaw('SUM(quantity) AS quantity, DAY(date) AS day')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$previous_date, $date])
                ->where('branch_id', $branch_id)
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get();

            $ra = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            foreach ($report as $r){
                $ra[$r->day - 1] = $r->quantity;
            }
            $report = $ra;

        } else {
            $previous_date = Carbon::now()->addDays('-365')->format('Y-m-d');
            $report = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->selectRaw('SUM(quantity) AS quantity, MONTH(date) AS month')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$previous_date, $date])
                ->groupBy('month')
                ->orderBy('month', 'ASC')
                ->get();

            $ra = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            foreach ($report as $r){
                $ra[$r->month - 1] = $r->quantity;
            }
            $report = $ra;
        }

        if ($request->input('order_month') != '') {
            $start_date = Carbon::now()->format('Y-m') . '-1';
            $end_date = Carbon::now()->format('Y-m') . '-31';

            $order_count = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$start_date, $end_date])
                ->count('orders.id');


        } else if ($request->input('order_year') != '') {
            $start_date = Carbon::now()->format('Y') . '-01-01';
            $end_date = Carbon::now()->format('Y') . '-12-31';

            $order_count = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$start_date, $end_date])
                ->count('orders.id');

        } else {
            $order_count = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->where('branch_id', $branch_id)
                ->where('date', $date)
                ->count('orders.id');
        }

        if ($request->input('revenue_month') != '') {
            $start_date = Carbon::now()->format('Y-m') . '-1';
            $end_date = Carbon::now()->format('Y-m') . '-31';
            $revenue = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->join('menu__sizes', 'menu__sizes.id', 'orders.size_id')
                ->join('currencies', 'currencies.id', 'menu__sizes.currency_id')
                ->selectRaw('sum(menu__sizes.price) as price, currencies.name, currencies.symbol')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$start_date, $end_date])
                ->first();

        } else if ($request->input('revenue_year') != '') {
            $start_date = Carbon::now()->format('Y') . '-01-01';
            $end_date = Carbon::now()->format('Y') . '-12-31';
            $revenue = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->join('menu__sizes', 'menu__sizes.id', 'orders.size_id')
                ->join('currencies', 'currencies.id', 'menu__sizes.currency_id')
                ->selectRaw('sum(menu__sizes.price) as price, currencies.name, currencies.symbol')
                ->where('branch_id', $branch_id)
                ->whereBetween('date', [$start_date, $end_date])
                ->first();
        } else {
            $revenue = Order::join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
                ->join('menu__sizes', 'menu__sizes.id', 'orders.size_id')
                ->join('currencies', 'currencies.id', 'menu__sizes.currency_id')
                ->selectRaw('sum(menu__sizes.price) as price, currencies.name, currencies.symbol')
                ->where('branch_id', $branch_id)
                ->where('date', $date)
                ->first();
        }


        $food_count = Menu::join('menu__sub__categories', 'menu__sub__categories.id', 'menus.cat_sub_id')
            ->join('menu__categories', 'menu__categories.id', 'menu__sub__categories.cat_id')
            ->where('res_id', $resturant_id)
            ->count('menus.id');

        $popular_foods = Menu::join('orders', 'orders.menu_id', 'menus.id')
            ->join("menu__sub__categories", 'menu__sub__categories.id', 'menus.cat_sub_id')
            ->join("menu__categories", 'menu__categories.id', 'menu__sub__categories.id')
            ->selectRaw('menus.name, menus.id, menus.description, menus.img, count(orders.id) as total_orders, (SELECT size FROM menu__sizes WHERE id = size_id) AS size')
            ->where('res_id', $resturant_id)
            ->groupBy('menus.id')
            ->orderBy('total_orders', 'DESC')
            ->limit('10')
            ->get();

        $recent_orders = Order::join('menus', 'orders.menu_id', 'menus.id')
            ->join('resturant__tables', 'resturant__tables.id', 'orders.tbl_id')
            ->join('menu__sizes', 'menu__sizes.id', 'orders.size_id')
            ->join('currencies', 'currencies.id', 'menu__sizes.currency_id')
            ->select('orders.id', 'menus.name', 'img', 'description', 'price', 'quantity', 'symbol', 'currencies.name AS currency', 'status', 'estimate_time', 'delivered_time', 'date', 'time')
            ->where('status', '<>', '4')
            ->where('branch_id', $branch_id)
            ->orderBy('orders.id', 'DESC')
            ->get();


        return view('dashboard', compact('order_count', 'revenue', 'food_count', 'popular_foods', 'recent_orders', 'report'));
    }
}
