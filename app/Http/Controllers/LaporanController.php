<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Status;
use DateTime;
use PDF;

class LaporanController extends Controller
{
    //
    public function index(Request $request){
        $tahun = Transaksi::selectRaw('YEAR(tgl_masuk) AS Tahun')->distinct()->get();
        $bulan = Transaksi::selectRaw('MONTH(tgl_masuk) AS Bulan, MONTHNAME(tgl_masuk) AS BulanFull')->distinct()->get();
        // jika terdapat sesi laporan
        if($request->session()->has('laporan')){
            // mengambil data sesi
            $laporan = $request->session()->get('laporan');
            $bulan_full = $request->session()->get('bulan');
            $bulan_num = $request->session()->get('bulan_num');
            // return response()->json($laporan);
            return view('pages.laporan.index', [
                'tahun' => $tahun,
                'bulan' => $bulan,
                'laporan' => $laporan,
                'bulan_full' => $bulan_full,
                'bulan_num' => $bulan_num,
            ]);
        }
        return view('pages.laporan.index', [
            'tahun' => $tahun,
            'bulan' => $bulan,
        ]);
        // return response()->json($bulan);
    }

    public function tampilkanLaporan(Request $request){
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $dateObj = DateTime::createFromFormat('!m', $bulan);
        $bulan_full = $dateObj->format('F');

        $tampilkan = Transaksi::where('id_status', '=', '3')->whereMonth('tgl_masuk', '=', $bulan)->whereYear('tgl_masuk', '=', $tahun)->get();
        $pendapatan = Transaksi::where('id_status', '=', '3')->whereMonth('tgl_masuk', '=', $bulan)->whereYear('tgl_masuk', '=', $tahun)->sum('total_bayar');
        // session dimulai
        $request->session()->put('laporan', $tampilkan);
        $request->session()->put('bulan', $bulan_full);
        $request->session()->put('bulan_num', $bulan);
        $request->session()->put('tahun', $tahun);
        $request->session()->put('pendapatan', $pendapatan);
        // return response()->json($tampilkan);
        return redirect()->route('laporan.index');
    }

    public function cetakPDF(Request $request){
        $laporan = $request->session()->get('laporan');
        $bulan_full = $request->session()->get('bulan');
        $tahun = $request->session()->get('tahun');
        $pendapatan = $request->session()->get('pendapatan');
        // pdf
        $pdf = PDF::loadview('pages.laporan.cetak_pdf', compact('laporan', 'bulan_full', 'tahun', 'pendapatan'));
        //mengahpus sesi
        $request->session()->forget('laporan');
        $request->session()->forget('bulan');
        $request->session()->forget('bulan_num');
        $request->session()->forget('tahun');
        $request->session()->forget('pendapatan');
        //melakukan unduh pdf
        return $pdf->download('laporan-keuangan-' . $bulan_full . '-' . $tahun . '.pdf');
    }
}
