<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Penjualan;

class BackController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all()->count();
        $produk = Barang::all()->count();
        return view('dashboard.index', [
            'penjualan' => $penjualan,
            'produk' => $produk
        ]);
    }

    public function daftar_users()
    {
        $all_users = Login::where('login_level', 'user')->get();
        return view('users.daftar-users', [
            'all_users' => $all_users
        ]);
    }

    public function hapus_user(Request $request, $id)
    {
        $login = Login::find($id);
        $hapus_users = $login->forceDelete();
        if ($hapus_users == true) {
            return redirect()->route('daftar-users')->with('status', 'User telah berhasil dihapus.');
        } else {
            return redirect()->route('daftar-users')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }

    public function update_produk(Request $request, $id)
    {
        $split_username = str_split($request->login_username);
        dd($split_username);

        $login_username = $request->login_username;
        $login_nama = $request->login_nama;
        $login_telepon = $request->login_telepon;
        $login_email = $request->login_email;
        $login = Login::find($id);
        $update_users = $login->update([
            'login_nama' => $login_nama,
            'login_username' => $login_username,
            'login_password' => $login_password,
            'login_email' => $login_email,
            'login_telepon' => $login_telepon,
            'updated_at' => now()
        ]);
        if ($update_users == true) {
            return redirect()->route('daftar-users')->with('status', 'Produk telah berhasil diubah.');
        } else {
            return redirect()->route('daftar-users')->with('status', 'Terjadi kesalahan. Data tidak dapat diubah.');
        }
    }

    public function login()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function register()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('register');
    }

    public function logout(Request $request)
    {
        $users = session('data_login');
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('status', 'Anda telah logout.');
    }

    public function postlogin(Request $request)
    {
        $username = $request->login_username;
        $password = $request->login_password;
        $data_login = Login::where('login_username', $username)->first();
        if ($data_login == null) {
            return redirect()->route('login')->with('status', 'Maaf username yang anda masukkan tidak terdaftar!');
        }
        switch ($data_login->login_level) {
            case 'admin':
                $cek_password = Hash::check($password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'user':
                $cek_password = Hash::check($password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
        }
        return back()->with('status', 'Maaf password yang anda masukkan salah!')->withInput();
    }
}
