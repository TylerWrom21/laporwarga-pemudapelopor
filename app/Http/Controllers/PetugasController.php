<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\User;

class PetugasController extends Controller
{
    public function index()
    {
        $total = Aspirasi::count();
        $dikirim = Aspirasi::where('status', 'dikirim')->count();
        $diproses = Aspirasi::where('status', 'diproses')->count();
        $selesai = Aspirasi::where('status', 'selesai')->count();

        return view('petugas.dashboard', compact('total', 'dikirim', 'diproses', 'selesai'));
    }
    public function show()
    {
        $aspirasis = Aspirasi::latest()->get();
        return view('petugas.aspirasi', compact('aspirasis'));
    }
    public function destroy($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);

        $aspirasi->delete();
        return redirect()->route('petugas.aspirasi')->with('success', 'Aspirasi berhasil dihapus.');
        // if ($aspirasi->user_id === auth()->id()) {
        // }

        abort(403);
    }
}
