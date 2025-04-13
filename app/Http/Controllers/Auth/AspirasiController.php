<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.aspirasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);
    
        Aspirasi::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'dikirim',
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Aspirasi berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aspirasi $aspirasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspirasi $aspirasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        //
    }
}
