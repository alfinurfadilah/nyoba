<?php

namespace App\Http\Controllers;
use App\Models\Datacalonpelanggan;
use App\Models\Datapembayaran;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{

    public function index() 
    {
        $totalDatacapel = datacalonpelanggan::count();
        $datapembayaran = Datapembayaran::where('payment_status', 'Belum Dibayar')->get();
    
        return view('homeadmin', compact('totalDatacapel', 'datapembayaran'));
    }

    public function pembayaran()
    {
        $datapembayaran = Datapembayaran::where('status', 'Belum Dibayar')->get();
        return view('homeadmin', compact('datapembayaran'));
    }
}
