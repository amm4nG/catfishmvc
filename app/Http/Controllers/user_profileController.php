<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class user_profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            // Jika ada data pengguna dalam session, ambil informasi pengguna
            $user = $request->session()->get('user');
            if ($user->foto == null) {
                $foto = 'https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png';
            } else {
                $foto = $user->foto;
            }
            $nama = $user->nama;
            $username = $user->username;
            $email = $user->email;
        }
        return view('user_profile', compact('foto', 'nama', 'username', 'email', 'user'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function update_profile(Request $request)
    {
        if (!$request->session()->has('user')) {
            return redirect()->route('login'); // Ganti dengan route login Anda
        }

        $id = $request->id;

        // Ambil pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Periksa apakah file gambar baru diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = $file->getClientOriginalName(); // Mendapatkan nama file asli
            $path = $request->file('foto')->storeAs('public/assets/img', $namaFile); // Menyimpan file dengan nama yang sama
            $user->foto = "public/assets/img/{$namaFile}";
        }else{
            $namaFile= $user->foto;
        }

        // Perbarui field yang ada dalam permintaan
        // if ($request->filled('nama')) {
        //     $user->nama = $request->nama;
        // }
        // if ($request->filled('alamat')) {
        //     $user->alamat = $request->alamat;
        // }
        // if ($request->filled('email')) {
        //     $user->email = $request->email;
        // }
        // if ($request->filled('username')) {
        //     $user->username = $request->username;
        // }
        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->password);
        // }
        user::where('id', $id)->update([
            'nama'=>$request->nama, 
            'alamat'=>$request->alamat, 
            'email'=>$request->email, 
            'username'=>$request->username,
            'foto'=>$namaFile,
        ]);
        return redirect()->route('user_profile');
        // $user->nama = $request->input('nama');
        // $user->username = $request->input('username');
        // $user->email = $request->input('email');
        // $user->alamat = $request->input('alamat');
        // // Simpan perubahan
        // $user->save();
    }
    public function berhasil_update(){
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
                $(document).ready(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Data berhasil diupdate",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = "user_profile";
                    });
                });
            </script>';
    }
        

    public function ubah_password(Request $request){
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;
        $reNewPassword = $request->reNewPassword;
        $user_id = $request->id;
    
        if ($currentPassword == ($user_id->password)) {
            if ($newPassword ==  $reNewPassword) {
                $user = user::findOrFail($user_id);
                $user->update(['password' => $request->newPassword]);
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "success",
                                title: "Password Berhasil Diupdate",
                                text: "Password Anda telah diperbarui.",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(function() {
                                window.location.href = "users-profile";
                            });
                        });
                      </script>';    
            } else {
                // Jika new password dan re-entered new password tidak cocok, tampilkan pesan error
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "error",
                                title: "Password Tidak Cocok",
                                text: "New password dan confirm password tidak cocok.",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        });
                      </script>';
            }
        } else {
            // Jika current password tidak cocok, tampilkan pesan error
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>
                    $(document).ready(function(){
                        Swal.fire({
                            icon: "error",
                            title: "Password Salah",
                            text: "Password saat ini salah. Silakan coba lagi.",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location.href = "users-profile";
                        });
                    });
                  </script>';
        }
    }
}
