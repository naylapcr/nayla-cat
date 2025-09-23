<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tglLahir = Carbon::createFromDate(2006, 9, 17);
        $umur = $tglLahir->age;


        $tglWisuda = Carbon::createFromDate(2028, 11, 30);
        $sisaHari = Carbon::now()->diffInDays($tglWisuda);

        $semester = 3;


        if ($semester < 3) {
            $infoSemester = "Masih Awal, Kejar TAK";
        } else {
            $infoSemester = "Jangan banyak main, kurangi malas-malasan";
        }

        $data = [
            'name' => 'Nayla Saf', //
            'my_age' => $umur,
            'hobbies' => ['Membaca', 'Menulis', 'Mendengarkan Musik', 'Olahraga', 'Memasak'],
            'tgl_harus_wisuda' => '30 November 2028',
            'time_to_study_left' => $sisaHari,
            'current_semester' => $semester,
            'info_semester' => $infoSemester,
            'future_goal' => 'Menjadi programmer handal dan sukses',
        ];

        return view('home', $data);
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
}
