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
        $birthDate          = Carbon::createFromDate(2006, 7, 2);
        $graduationDate     = Carbon::createFromDate(2028, 9, 29);

        $data = [
            'name'              => 'Yusuf',
            'my_age'            => $birthDate->diffInYears(Carbon::now()),
            'hobbies'           => ['Membaca', 'Coding', 'Main Game', 'Olahraga', 'Nonton Film'],
            'tgl_harus_wisuda'  => $graduationDate->format('d F Y'),
            'time_to_study_left'=> $graduationDate->diffInDays(Carbon::now()),
            'current_semester'  => 3,
            'future_goal'       => 'Menjadi Full-stack Developer',
        ];

        if ($data['current_semester'] < 3) {
            $data['semester_info'] = 'Masih Awal, Kejar TAK';
        } else {
            $data['semester_info'] = 'Jangan main-main, kurang-kurangi main game!';
        }

        return view('pegawai.index', $data);
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
