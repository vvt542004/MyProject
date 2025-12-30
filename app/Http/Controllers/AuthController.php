<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ========== ĐĂNG KÝ ========== */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect('/dangnhap')->with('success', 'Đăng ký thành công');
    }

    /* ========== ĐĂNG NHẬP ========== */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    /* ========== ĐĂNG XUẤT ========== */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /* ========== TRANG THÔNG TIN ========== */
    public function index()
    {
        return view('Login.Thongtin');
    }

    /* ========== CẬP NHẬT THÔNG TIN ========== */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;

        // Upload avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('avatars', $avatarName, 'public');
            $user->avatar = $avatarName;
        }

        // Đổi mật khẩu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Cập nhật hồ sơ thành công');
    }
}
