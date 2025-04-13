<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function showregister()
    {
        return view('auth.registrasi');
    }
    public function showlogin()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function register(Request $request)
    {
        // $validated = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'nik' => 'required|string|max:255',
        //     'telp' => 'nullable|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'role' => 'masyarakat',
        //     'password' => 'required|min:8|confirmed',
        // ]);
        // $validated['password'] = Hash::make($validated['password']);
        // User::create($validated);

        // return redirect()->route('dashboard')->with('success', 'Registration successful! Please login.');

        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:32'],
            'nik' => ['required', 'string', 'max:16', 'unique:users,nik'],
            'telp' => ['required', 'string', 'max:16', 'unique:users,telp'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => 'masyarakat',
            'password' => ['required', 'min:8', 'confirmed'],
        ], [
            'nik.unique' => 'NIK ini sudah digunakan.',
            'telp.unique' => 'Nomor Telepon ini sudah digunakan.',
            'email.unique' => 'Email ini sudah digunakan.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'telp' => $request->telp,
            'email' => $request->email,
            'role' => 'masyarakat',
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('user.profile', compact('user'));
    }

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        return view('user.edit', compact('user'));
    }

    
    public function update(Request $request, $slug)
    {
        // echo "update";
        $user = User::where('slug', $slug)->firstOrFail();

        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|max:255',
            'birthday' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'nullable|string|max:255',
        ]);
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }
        $validated['slug'] = Str::slug($validated['name']);

        $user->update($validated);

        // return view('user.profile', compact('user'));
        return redirect()->route('user.profile', $user->slug)
            ->with('success', 'User has been updated!');
    }

    public function destroy(User $slug)
    {
        $user->delete();
        return redirect()->route('login')
            ->with('success', 'User deleted!');
    }
}