<?php

namespace App\Http\Controllers;
use App\Models\Teknisi;
use App\Models\Datacalonpelanggan;
use App\Models\Datapembayaran;
use Illuminate\Http\Request;

class HomeTeknisiController extends Controller
{
    
    public function index() 
    {
        // Menghitung total data calon pelanggan
        $totalTeknisi = Teknisi::count();

        // Menghitung total pembayaran yang sudah dibayar
        $totaldatapembayaran = Datapembayaran::where('payment_status', 'Sudah Dibayar')->count();

        // Menghitung total pemasukan dari harga paket yang sudah dibayar
        $totalPemasukan = Datapembayaran::where('payment_status', 'Sudah Dibayar')->sum('harga_paket');

        // Mengambil data calon pelanggan dengan status survey
        $datasurvey = Datacalonpelanggan::where('status', 'Survey')->get();

        // Mengambil data calon pelanggan dengan status pemasangan
        $datapemasangan = Datacalonpelanggan::where('status', 'Pemasangan')->get();

        return view('hometeknisi', compact('totalTeknisi', 'datasurvey', 'datapemasangan', 'totaldatapembayaran', 'totalPemasukan'));
    }
    
}
