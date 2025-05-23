<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with([
            'total_laporan' => Aspirasi::count(),
            'total_laporan_baru' => Aspirasi::where('status', 'dikirim')->count(),
            'pengguna' => User::where('role', 'masyarakat')->count(),
            'laporan_terbaru' => Aspirasi::latest()->take(5)->get(),
        ]);
    }
}
