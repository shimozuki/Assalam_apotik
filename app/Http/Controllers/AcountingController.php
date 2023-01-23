<?php

namespace App\Http\Controllers;

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
        }elseif ($transaksi == 2) {
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
        }elseif ($transaksi == 3) {
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
        }elseif ($transaksi == 4) {
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
        }elseif ($transaksi == 5) {
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
        }elseif ($transaksi == 6) {
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
        }elseif ($transaksi == 7) {
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
        }elseif ($transaksi == 8) {
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
        }elseif ($transaksi == 9) {
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
        }elseif ($transaksi == 10) {
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
                $notification=array(
                    'message'=>"Jurnal Umum has been added",
                    'alert-type'=>'success',
                );
                return redirect()->route('products')->with($notification);
            }
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>"Jurnal Umum  filed to added",
                'alert-type'=>'danger',
            );
            return redirect()->route('products')->with($notification);
        }
    }
    public function show(Request $request, $id)
    {
        $title = "edit Jurnal";
        $jurnal = DB::table('acountings')->find($id);
        return view('edit-jurnal',compact(
            'title','jurnal'
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
                $notification=array(
                    'message'=>"Jurnal Umum has been Updated",
                    'alert-type'=>'success',
                );
                return redirect()->route('jurnal-umum')->with($notification);
            }
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>"Jurnal Umum filed to update",
                'alert-type'=>'danger',
            );
            return redirect()->route('jurnal-umum')->with($notification);
        }
    }
}