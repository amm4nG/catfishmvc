<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class riwayatController extends Controller
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
        $percentage_riwayat = ($totalCount_riwayat > 0) ? ($totalCount_riwayat / $completedCount_riwayat) * 100 : 0;
        // Hitung total jadwal hari ini
        // Hitung jadwal yang statusnya 'Selesai' hari ini
        // Hitung persentase
        $jadwals = jadwal::where('status', 'Selesai')->orderBy('id', 'desc')->get();
        return view('riwayat', compact('foto', 'nama', 'username', 'email', 'totalCount_today', 'totalCount_total', 'totalCount_riwayat', 'percentage_today', 'percentage_total', 'percentage_riwayat', 'jadwals'));
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

}
