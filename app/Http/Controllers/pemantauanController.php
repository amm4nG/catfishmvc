<?php

namespace App\Http\Controllers;

use App\Models\pakan;
use App\Models\stok;
use Illuminate\Http\Request;

class pemantauanController extends Controller
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
         $stok = stok::find(1);
         $percentage = isset($stok->persentase) ? intval($stok->persentase) : 0;
         $pakanList = pakan::orderBy('id', 'desc')->get();
        return view('pemantauan', compact('foto', 'nama', 'username', 'email', 'percentage', 'stok','pakanList' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        
        $stok = stok::find(1);
    
        if($stok) {
            
            $stok->update([
                'persentase' => $data['persentase'],
                'jumlah' => 200,
                'min' => 23, 
                'max' => 100, 
            ]);    
    
            return response()->json(['message' => 'Persentase updated successfully'], 200);
        } else {
        
            return response()->json(['error' => 'Stok not found'], 404);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     */


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
    public function update_pakan(Request $request){
        $request->validate([
            'id' => 'required',
            'pakan' => 'required',
        ]);
        $pakan = Pakan::find($request->id);
        if ($pakan) {
            $pakan->update([
                'pakan' => $request->pakan,
                'tanggal' => now(),
            ]);
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
                            window.location.href = "pemantauan";
                        });
                    });
                  </script>';
        }else{
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>
                    $(document).ready(function(){
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Gagal mengupdate data. Silakan coba lagi.",
                            confirmButtonText: "OK"
                        }).then(function() {
                            window.history.back();
                        });
                    });
                  </script>';
        }
    }
    public function hapus_pakan(Request $request){
        $id = $request->id;
        $pakan = pakan::findOrFail($id);
        $pakan->delete();
        if (($pakan->incrementing) == True){
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
                            window.location.href = "pemantauan";
                        });
                    });
                  </script>';
        } else {
            // Jika gagal menghapus, tampilkan pesan gagal
            echo "<script>alert('Gagal menghapus data.'); window.location='pemantauan';</script>";
        }
    }
    public function tambah_stok(Request $request){
        $request->validate([
            'pakan' => 'required|integer',
        ]);
        pakan::create([
            'pakan' => $request->pakan,
            'tanggal' => now(),
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
                        window.location.href = "pemantauan";
                    });
                });
              </script>';
    }
    public function update_minimum(Request $request){
        $request->validate([
            'min' => 'required',
        ]);
        $stok = stok::find(1);
        if ($stok) {
            $stok->update([
                'jumlah' => $stok->jumlah,
                'persentase' => $stok->persentase,
                'min' => $request->min,
                'max' => $stok->max,
            ]);
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
                            window.location.href = "pemantauan";
                        });
                    });
                  </script>';
        }
    }
}
