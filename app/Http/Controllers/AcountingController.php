<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\TrueType;

class AcountingController extends Controller
{
    public function index()
    {
        $data = DB::table('acountings')->orderBy('created_at', 'desc')->get();

        return view('jurnalumum', compact('data'));
    }

    public function create()
    {
        $date = date('Y-m-d');
        $pembelian_k = DB::table('purchases')->select(DB::raw('SUM(price) as pembelian'))->where('created_at', '>', 'NOW(), INTERVAL - 1 day')->get();
        return view('add-jurnal', compact('pembelian_k'));
    }

    public function store(Request $request)
    {
        $transaksi = $request->name;

        if ($transaksi == 1) {
            $data = [
                'name_perkiraan' => 'Piutang Pegawai',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 2) {
            $data = [
                'name_perkiraan' => 'Sewa dibayar di muka',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 3) {
            $data = [
                'name_perkiraan' => 'Beli Obat dan alat kesehatan',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Hutang Dagang',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 4) {
            $data = [
                'name_perkiraan' => 'Peralatan Toko',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 5) {
            $data = [
                'name_perkiraan' => 'HUTANG BANK',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 6) {
            $data = [
                'name_perkiraan' => 'GAJI PEGAWAI',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 7) {
            $data = [
                'name_perkiraan' => 'REKENING AIR',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 8) {
            $data = [
                'name_perkiraan' => 'Biaya Listrik & Telepon',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 9) {
            $data = [
                'name_perkiraan' => 'Biaya lain-lain',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        } elseif ($transaksi == 10) {
            $data = [
                'name_perkiraan' => 'Prive Owner',
                'tanggal' => $request->tanggal,
                'debet' => $request->biyaya,
                'kredit' => 0,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($data);
            $kas = [
                'name_perkiraan' => 'Kas',
                'tanggal' => $request->tanggal,
                'debet' => 0,
                'kredit' => $request->biyaya,
                'keterangan' => $request->keterangan,
            ];
            $insert = DB::table('acountings')->insert($kas);
        }
        try {
            if ($insert == true) {
                $notification = array(
                    'message' => "Jurnal Umum has been added",
                    'alert-type' => 'success',
                );
                return redirect()->route('products')->with($notification);
            }
        } catch (\Throwable $th) {
            $notification = array(
                'message' => "Jurnal Umum  filed to added",
                'alert-type' => 'danger',
            );
            return redirect()->route('products')->with($notification);
        }
    }
    public function show(Request $request, $id)
    {
        $title = "edit Jurnal";
        $jurnal = DB::table('acountings')->find($id);
        return view('edit-jurnal', compact(
            'title',
            'jurnal'
        ));
    }

    public function update(Request $request, $jurnal)
    {
        $update = DB::table('acountings')->where('id', $jurnal)->update([
            'name_perkiraan' => $request->name,
            'debet' => $request->debet,
            'kredit' => $request->kredit,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'update_at' => date('Y-m-d H:i:s'),
        ]);

        try {
            if ($update == true) {
                $notification = array(
                    'message' => "Jurnal Umum has been Updated",
                    'alert-type' => 'success',
                );
                return redirect()->route('jurnal-umum')->with($notification);
            }
        } catch (\Throwable $th) {
            $notification = array(
                'message' => "Jurnal Umum filed to update",
                'alert-type' => 'danger',
            );
            return redirect()->route('jurnal-umum')->with($notification);
        }
    }

    public function bukubesar(Request $request)
    {
        $nama_akun = $request->name;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $get_akun = DB::table('acountings')->select('name_perkiraan')->get();
        // DB::enableQueryLog();
        $query = DB::table('acountings')->select('*')->where('name_perkiraan', $nama_akun)->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->get();
        // dd(DB::getQueryLog());
        return view('bukubesar', compact('query', 'get_akun'));
    }

    public function get_bukubesar(Request $request)
    {
        if ($request->resource == 'products') {
            $nama_akun = $request->name;
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $get_akun = DB::table('acountings')->select('name_perkiraan')->get();
            // DB::enableQueryLog();
            $query = DB::table('acountings')->select('*')->where('name_perkiraan', $nama_akun)->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->get();
            // dd(DB::getQueryLog());
            return view('bukubesar', compact('query', 'get_akun'));
            // echo "<pre>";
            // print_r($query);
            // echo "</pre>";
        }
    }


    public function laba_rugi(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $product = $request->product;
        // DB::enableQueryLog();
        $query = DB::table('acountings')->select('tanggal',DB::raw('SUM(debet) AS persedian_awal'))
                ->where('name_perkiraan', 'Beli Obat dan alat kesehatan')
                ->orWhere('name_perkiraan', 'Beban Persediaan')
        // dd(DB::getQueryLog());
                ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->first();
        $get_gaji = DB::table('acountings')->select(DB::raw('SUM(debet) AS gaji'))
                    ->where('name_perkiraan', 'Gaji Pegawai')->first();
                    // ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->get();
        $get_biyaya = DB::table('acountings')->select(DB::raw('SUM(debet) AS biyaya'))
                      ->where('name_perkiraan', 'Biaya lain-lain')
        ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->first();
// dd(DB::getQueryLog());
        // ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->get();
        $get_pb = DB::table('sales')
                  ->join('products', 'sales.product_id', '=', 'products.id')
                  ->join('purchases', 'products.purchase_id', '=', 'purchases.id')
                  ->select(DB::raw('SUM(sales.total_price) AS total_penjualan'), DB::raw('SUM(purchases.price) AS total_pembelian'))
                  ->whereBetween(DB::raw('DATE(sales.created_at)'), [$from_date, $to_date])->first();
        return view('labarugi', compact('query', 'get_pb', 'get_biyaya', 'get_gaji', 'product'));

        // echo "<pre>";
        // print_r($get_biyaya);
        // print_r($product);
        // echo "</pre>";
    }
    public function get_labarugi(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $product = $request->product;
        // DB::enableQueryLog();
        $query = DB::table('acountings')->select('tanggal',DB::raw('SUM(debet) AS persedian_awal'))
                ->where('name_perkiraan', 'Beli Obat dan alat kesehatan')
                ->orWhere('name_perkiraan', 'Beban Persediaan')
        // dd(DB::getQueryLog());
                ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->first();
        $get_gaji = DB::table('acountings')->select(DB::raw('SUM(debet) AS gaji'))
                    ->where('name_perkiraan', 'Gaji Pegawai')->first();
                    // ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->get();
        $get_biyaya = DB::table('acountings')->select(DB::raw('SUM(debet) AS biyaya'))
                      ->where('name_perkiraan', 'Biaya lain-lain')
        ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->first();
// dd(DB::getQueryLog());
        // ->whereBetween(DB::raw('DATE(tanggal)'), [$from_date, $to_date])->get();
        // DB::enableQueryLog();
        $get_pb = DB::table('sales')
                  ->join('products', 'sales.product_id', '=', 'products.id')
                  ->join('purchases', 'products.purchase_id', '=', 'purchases.id')
                  ->select(DB::raw('SUM(sales.total_price) AS total_penjualan'), DB::raw('SUM(purchases.price) AS total_pembelian'))
                  ->whereBetween(DB::raw('DATE(purchases.created_at)'), [$from_date, $to_date])->first();
                //   dd(DB::getQueryLog());
        return view('labarugi', compact('query', 'get_pb', 'get_biyaya', 'get_gaji', 'product'));
        // // echo "<pre>";
        // print_r($get_pb);
        // echo "</pre>";
    }

}
