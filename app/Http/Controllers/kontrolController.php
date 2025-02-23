<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class kontrolController extends Controller
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
        $today = Carbon::today()->toDateString();
        $totalCount_today = jadwal::where('tanggal', $today)->count();
        $completedCount_today = jadwal::where('tanggal', $today)->where('status', 'Selesai')->count();
        $percentage_today = ($totalCount_today > 0) ? ($completedCount_today / $totalCount_today) * 100 : 0;

        $totalCount_total = jadwal::count();
        $completedCount_total = jadwal::where('tanggal', $today)->count();
        $percentage_total = ($totalCount_total > 0) ? ($completedCount_total / $totalCount_total) * 100 : 0;

        $totalCount_riwayat = jadwal::where('status', 'Selesai')->count();
        $completedCount_riwayat = jadwal::count();  
        $percentage_riwayat = ($totalCount_riwayat > 0) ? ($totalCount_riwayat/$completedCount_riwayat) * 100 : 0;
        // Hitung total jadwal hari ini
        // Hitung jadwal yang statusnya 'Selesai' hari ini
        // Hitung persentase
        $jadwals = Jadwal::where('status', 'Belum')->orderBy('id', 'desc')->get();
        return view('kontrol', compact('foto', 'nama', 'username', 'email', 'totalCount_today','totalCount_total' , 'totalCount_riwayat' , 'percentage_today', 'percentage_total' , 'percentage_riwayat' , 'jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

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

    public function getScheduleData()
    {
        $today = Carbon::today('Asia/Jakarta')->toDateString();
        $now = Carbon::now('Asia/Jakarta')->format('H:i:s'); 

        $schedule = jadwal::where('tanggal', $today)
                          ->where('waktu', $now)
                          ->where('status', 'Belum')
                          ->first();

        if ($schedule) {
            return response()->json([
                'id' => $schedule->id,
                'tanggal' => $schedule->tanggal,
                'waktu' => $schedule->waktu,
                'durasi' => $schedule->durasi,
                'status' => $schedule->status
            ]);
        } else {
            return response()->json([
                'id' => null,
                'tanggal' => null,
                'waktu' => null,
                'durasi' => null,
                'status' => null
            ]);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'durasi' => 'required',
            'status' => 'required'
        ]);
        $id = $request->id;
        $durasi = $request->durasi;
        if($durasi <= 0){
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>
                    $(document).ready(function(){
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Durasi tidak boleh 0",
                            confirmButtonText: "OK"
                        }).then(function() {
                            window.location.href = "kontrol";
                        });
                    });
                  </script>';
            exit();
        }
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
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
                        window.location.href = "kontrol";
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
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        if (($jadwal->incrementing) == True){
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
                            window.location.href = "kontrol";
                        });
                    });
                  </script>';
        } else {
            // Jika gagal menghapus, tampilkan pesan gagal
            echo "<script>alert('Gagal menghapus data.'); window.location='kontrol';</script>";
        }
    }
    
    public function tambah_data(Request $request){
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'durasi' => 'required',
        ]);

        Jadwal::create([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'durasi' => $request->durasi,
            'status' => 'Belum',
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
                        window.location.href = "kontrol";
                    });
                });
              </script>';
    }
}
