<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sales;
use App\Models\Product;
use App\Models\Purchase;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $title = "generate Reports";
        return view('reports',compact(
            'title',
        ));
    }

    public function getData(Request $request){
        $this->validate($request,[
            'from_date'=>'required',
            'to_date'=>'required',
            'resource'=>'required',
        ]);
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $jam = '23:59:00';
        if ($request->resource == 'sales'){
            // DB::enableQueryLog();
            $sales = Sales::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date, $jam))->get();
            // dd(DB::getQueryLog());
            $pembelian = Purchase::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            foreach ($pembelian as $key => $value) {
                $harga_beli = $value->price;
            }
            foreach ($sales as $key => $value) {
                $total_jual = $value->total_price;
            }
            $total_sales = $sales->count();
            $total_cash =$sales->sum('total_price');
            $laba_rugi = $total_cash - $harga_beli;
            $title = "Sales Reports";
            return view('reports',compact('sales','title','total_sales','total_cash', 'laba_rugi', 'harga_beli'));
        }
        if($request->resource == "products"){
            $title = "Products Reports";
            $products = Product::whereBetween(DB::raw('DATE(created_at[0])'), array($from_date, $to_date))->get();
            return view('reports',compact('title','products'));
        }
        if($request->resource == 'purchases'){
            $title = "Purchases Reports";
            $purchases = Purchase::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            return view('reports',compact('title','purchases'));
        }
    }
}
