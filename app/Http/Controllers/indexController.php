<?php

namespace App\Http\Controllers;

use App\Models\isvalue;
use App\Models\jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
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
            date_default_timezone_set('Asia/Jakarta');
            $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
    
            $nearestSchedule = jadwal::select('*', DB::raw("TIMEDIFF(CONCAT(tanggal, ' ', waktu), '$currentDateTime') AS time_diff"))
                ->whereRaw("CONCAT(tanggal, ' ', waktu) >= '$currentDateTime'")
                ->orderByRaw("CONCAT(tanggal, ' ', waktu) ASC")
                ->first();
    
            if ($nearestSchedule) {
                $scheduleTime = Carbon::parse($nearestSchedule->tanggal . ' ' . $nearestSchedule->waktu);
                $currentTime = Carbon::parse($currentDateTime);
                $timeDiff = $scheduleTime->diffInSeconds($currentTime);
                $time = $nearestSchedule->waktu;
    
                $data = [
                    'schedule' => $nearestSchedule,
                    'time_diff' => $timeDiff,
                    'time' => $time
                ];
            } else {
                $data = null;
            }
            $status = $this->getStatus();
            return view('index', compact('foto', 'nama', 'username', 'email', 'data', 'status'));
        } else {
            // Jika tidak ada data pengguna dalam session, redirect ke halaman login
            return redirect()->route('Login');
        }
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
    public function updateStatus(Request $request)
    {
        if ($request->has('updateStatus')) {
            // Update status logic here
            // Misalnya, mengubah status di database

            // Contoh: toggle status
            $currentStatus = $this->getStatus();
            $newStatus = $currentStatus == 0 ? 1 : 0;
            // Update status in the database
            $this->setStatus($newStatus);
        }
        
        return redirect('/');
    }

    private function getStatus()
    {
        // Logika untuk mendapatkan status dari database atau sumber lain
        // Misalnya:
        $status = DB::table('isvalue')->get()->value('status');
        return $status;

        // Sementara, kita return 0 atau 1 secara statis untuk contoh
        // return 1;
    }
    private function setStatus($status)
    {
        // Logika untuk mengupdate status di database atau sumber lain
        // Misalnya:
        isvalue::truncate();
        // Menyisipkan data baru ke dalam tabel isvalue
        isvalue::create([
            'status' => $status,
        ]);

        // Tidak ada operasi nyata di sini, hanya contoh
    }
}
