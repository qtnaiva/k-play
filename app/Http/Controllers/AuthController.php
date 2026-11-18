<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Daftar user dummy untuk login testing.
     * Nanti diganti fetch dari Google Sheets sheet `users`.
     */
    protected function users(): array
    {
        return [
            ['id'=>1,'nama'=>'Rina','username'=>'@rina_kpop','email'=>'rina@kplay.com','password'=>'password','avatar'=>'https://i.pravatar.cc/200?img=44','bio'=>'Fanartist | BTS 💜'],
            ['id'=>2,'nama'=>'Dimas','username'=>'@dimas_svt','email'=>'dimas@kplay.com','password'=>'password','avatar'=>'https://i.pravatar.cc/200?img=15','bio'=>'Cover Dancer | SVT 🐯'],
            ['id'=>3,'nama'=>'Sari','username'=>'@sari_bp','email'=>'sari@kplay.com','password'=>'password','avatar'=>'https://i.pravatar.cc/200?img=45','bio'=>'Video Editor | BP 💗'],
        ];
    }

    public function showLogin()
    {
        if (session()->has('user')) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        $users = $this->users();
        $user = collect($users)->firstWhere('email', $validated['email']);

        if (!$user || $user['password'] !== $validated['password']) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email atau password salah.']);
        }

        // Simpan user ke session (tanpa password)
        $sessionUser = $user;
        unset($sessionUser['password']);
        session(['user' => $sessionUser]);

        return redirect()->route('home')
            ->with('success', 'Selamat datang kembali, ' . $sessionUser['nama'] . '! 💜');
    }

    public function showRegister()
    {
        if (session()->has('user')) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|min:2|max:100',
            'username' => 'required|string|min:3|max:30|regex:/^[a-zA-Z0-9_]+$/',
            'email'    => 'required|email|max:150',
            'password' => 'required|string|min:6|confirmed',
            'bias'     => 'nullable|string|max:100',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'nama.min'           => 'Nama minimal 2 karakter.',
            'username.required'  => 'Username wajib diisi.',
            'username.min'       => 'Username minimal 3 karakter.',
            'username.regex'     => 'Username hanya boleh huruf, angka, underscore.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Cek email sudah terpakai
        $users = $this->users();
        if (collect($users)->firstWhere('email', $validated['email'])) {
            return back()
                ->withInput($request->only('nama','username','email','bias'))
                ->withErrors(['email' => 'Email sudah terdaftar. Coba yang lain atau login.']);
        }

        // TODO: nanti insert ke Google Sheets lewat GoogleSheetService
        $newUser = [
            'id'       => count($users) + 1,
            'nama'     => $validated['nama'],
            'username' => '@' . strtolower($validated['username']),
            'email'    => $validated['email'],
            'avatar'   => 'https://i.pravatar.cc/200?u=' . urlencode($validated['email']),
            'bio'      => $validated['bias'] ? 'Bias: ' . $validated['bias'] : 'Member baru K-PLAY',
        ];

        session(['user' => $newUser]);

        return redirect()->route('home')
            ->with('success', 'Akun berhasil dibuat. Selamat datang, ' . $newUser['nama'] . '! 🎉');
    }

    public function logout(Request $request)
    {
        session()->forget('user');
        return redirect()->route('home')
            ->with('success', 'Kamu sudah logout. Sampai jumpa lagi! 💜');
    }
}