<?php

namespace App\Http\Controllers;

use App\Models\catatan;
use Illuminate\Http\Request;

class pencatatanController extends Controller
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
        $catatans = Catatan::orderBy('id', 'desc')->get();
        return view('pencatatan', compact('foto', 'nama', 'username', 'email', 'catatans'));
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
    public function update(Request $request)
    {
        $request->validate([
            'waktu' => 'required',
            'catatan' => 'required'
        ]);
        $id = $request->id;
        $catatan = catatan::findOrFail($id);
        $catatan->update($request->all());
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
                $(document).ready(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Data berhasil diubah",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = "pencatatan";
                    });
                });
              </script>';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $catatan = catatan::findOrFail($id);
        $catatan->delete();
        if (($catatan->incrementing) == True){
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>
                    $(document).ready(function(){
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: "Data berhasil dihapus",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location.href = "pencatatan";
                        });
                    });
                  </script>';
            exit();
        } else {
            // Jika gagal menghapus, tampilkan pesan gagal
            echo "<script>alert('Gagal menghapus data.'); window.location='pencatatan';</script>";
        }
    }

    public function tambah_catatan(Request $request){
        $request->validate([
            'waktu' => 'required',
            'catatan' => 'required',
        ]);
        catatan::create([
            'waktu' => $request->waktu,
            'catatan' => $request->catatan,
        ]);
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
                $(document).ready(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Data berhasil ditambah",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = "pencatatan";
                    });
                });
              </script>';
    }
}
