<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
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
    public function berhasil_login(){
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
                $(document).ready(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Anda berhasil login!",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = "index";
                    });
                });
            </script>';
    }
    public function klikLogin (Request $request)
    {
        if(empty($_POST['username']) || empty($_POST['password'])) {
            // Jika ada input yang kosong, tampilkan pesan pop-up dan redirect kembali ke halaman login
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>
                    $(document).ready(function(){
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Masukkan username dan password",
                            confirmButtonText: "OK"
                        }).then(function() {
                            window.location.href = "Login";
                        });
                    });
                  </script>';
            exit();
        }
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sqlUser = User::where('username', $username)->first();
        if ($sqlUser != null) {
            $passwordVal = $sqlUser->password;
            if ($password !== $passwordVal) {
                // Jika password salah, tampilkan pesan pop-up dan redirect kembali ke halaman login
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Password Anda salah!",
                                confirmButtonText: "OK"
                            }).then(function() {
                                window.location.href = "Login";
                            });
                        });
                      </script>';
                exit();
            } else {
                // Jika username dan password cocok, tampilkan pesan pop-up "Anda berhasil login" dan redirect ke halaman index
                Auth::login($sqlUser);
                $request->session()->put('user', $sqlUser);
                return redirect()->route('berhasil_login');
            }
        } else {
            // Jika username tidak ditemukan dalam tabel user, tampilkan pesan pop-up dan redirect kembali ke halaman login
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "error",
                                title: "oops...",
                                text: "Username salah",
                            }).then(function() {
                                window.location.href = "Login";
                            });
                        });
                      </script>';
            exit();
        }
    }
    public function actionlogout()
    {
        session()->forget('user');
        return redirect('/');
    }
}
