<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        $totalcustomer = Customer::count();
        $totalproduk = Produk::count();
        $totalorder = Order::count();
        $totalpending = Order::where('status', 'pending_payment')->count();
        $totalproses = Order::where('status', 'Proses')->count();
        $totalomset = Order::where('status', '!=', 'pending_payment')->sum('total_harga');
        // ->where('status', '!=', 'pending_payment') -> jika ingin pakai pending_payment
        $orders = Order::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(*) as total'))->groupBy('tanggal')->orderBy('tanggal', 'ASC')->get();
        $latestpost = Produk::orderBy('id','desc')->take(3)->get();

        $tanggal = $orders->pluck('tanggal');
        $totalOrder = $orders->pluck('total');

        return view('backend.v_beranda.index', [
            'judul' => 'Halaman Beranda',
            'tanggal' => $tanggal,
            'totalOrder' => $totalOrder,
            'totalcustomer' => $totalcustomer,
            'totalproduk' => $totalproduk,
            'totalorder' => $totalorder,
            'totalpending' => $totalpending,
            'totalproses' => $totalproses,
            'totalomset' => $totalomset,
            'latestpost' => $latestpost,
        ]);
    }
    public function index()
    {
        $produk = Produk::where('status', 1)->orderBy('updated_at', 'desc')->paginate(3);
        return view('v_beranda.index', [
            'judul' => 'Halan Beranda',
            'produk' => $produk,
        ]);
    }

    public function location()
    {
        return view('v_beranda.lokasi');
    }
}
