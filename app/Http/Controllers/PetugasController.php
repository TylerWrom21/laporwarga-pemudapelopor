<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
    public function masyarakat()
    {
        $masyarakats = User::where('role', 'masyarakat')->latest()->get();

        return view('petugas.masyarakat', compact('masyarakats'));
    }
    public function show()
    {
        $aspirasis = Aspirasi::latest()->get();
        
        return view('petugas.aspirasi', compact('aspirasis'));
    }
    public function tanggapan()
    {
        $aspirasi = Aspirasi::where('id', '$id')->get();
        
        return view('petugas.tanggapan', compact('aspirasi'));
    }
    public function detail($uuid)
    {
        $aspirasi = Aspirasi::where('uuid', $uuid)->with('user')->firstOrFail();
        return view('petugas.detail', compact('aspirasi'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('petugas.masyarakat')->with('success', 'Akun berhasil dihapus.');
        // if ($aspirasi->user_id === auth()->id()) {
        // }

        abort(403);
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
