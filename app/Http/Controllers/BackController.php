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
        $pengguna = Login::all()->count();
        return view('dashboard.index', [
            'penjualan' => $penjualan,
            'produk' => $produk,
            'pengguna' => $pengguna,
        ]);
    }

    public function daftar_users()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $all_users = Login::whereNotIn('id', [$users->id])->get();
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

    public function update_user(Request $request, $id)
    {
        $split_username = str_split($request->login_username);

        foreach ($split_username as $item) {
            if ($item == ' ' || $item == '/' || $item == '&') {
                return redirect()->route('daftar-users')->with('status', 'Terjadi kesalahan. Username tidak dapat mengandung karakter spesial seperti spasi, / dan &');
            }
        }

        $login_username = $request->login_username;
        $login_nama = $request->login_nama;
        $login_telepon = $request->login_telepon;
        $login_email = $request->login_email;
        $login = Login::find($id);
        $update_users = $login->update([
            'login_nama' => $login_nama,
            'login_username' => $login_username,
            'login_email' => $login_email,
            'login_telepon' => $login_telepon,
            'updated_at' => now()
        ]);
        if ($update_users == true) {
            return redirect()->route('daftar-users')->with('status', 'User telah berhasil diubah.');
        } else {
            return redirect()->route('daftar-users')->with('status', 'Terjadi kesalahan. Data tidak dapat diubah.');
        }
    }

    public function postregister(Request $request)
    {
        $validatedLogin                 = $request->validate([
            'login_username'            => 'required',
            'login_password'            => 'required',
        ]);
        $role = $request->role;
        if ($role == null) {
            $login_level = "user";
        } else {
            $login_level = $role;
        }
        $login_nama = $request->login_nama;
        $login_telepon = $request->login_telepon;
        $login_email = $request->login_email;
        $login_password2 = $request->login_password2;
        $login_username = $validatedLogin['login_username'];
        $login_password = $validatedLogin['login_password'];
        if ($validatedLogin["login_password"] !== $request->login_password2) {
            return back()->with('status', 'Password harus sama.')->withInput();
        }
        $hashPassword                           = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token_raw                              = Str::random(16);
        $login_token                            = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $login_status                           = "verified";
        $login = new login;
        $save_login = $login->create([
            'login_nama' => $login_nama,
            'login_username' => $login_username,
            'login_password' => $hashPassword,
            'login_email' => $login_email,
            'login_telepon' => $login_telepon,
            'login_token' => $login_token,
            'login_level' => $login_level,
            'login_status' => $login_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $cek_save_login = $save_login->save();
        if ($cek_save_login == true) {
            if ($role == null) {
                return redirect()->route('login')->with('status', 'Berhasil melakukan registrasi!');
            } else {
                return redirect()->route('daftar-users')->with('status', 'Berhasil membuat data user baru.');
            }
        } else {
            return redirect()->route('register')->with('status', 'Maaf, pendaftaran anda gagal, silahkan mencoba kembali.');
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
