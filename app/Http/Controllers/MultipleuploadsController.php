<?php

namespace App\Http\Controllers;

use App\Models\Multipleuploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultipleuploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelangganId = $request->pelanggan_id;

        // Ambil hanya file yang terkait dengan pelanggan ini
        $files = Multipleuploads::where('pelanggan_id', $pelangganId)->get();
        return view ('multipleuploads', compact('files', 'pelangganId'));
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
        $request->validate([
            'pelanggan_id' => 'required|integer|exists:pelanggan,pelanggan_id',
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000' // Aturan validasi [cite: 30]
        ]);

        $pelangganId = $request->pelanggan_id;

        if ($request->hasfile('filename')) {
            $files_data = [];
            $storage_path = 'pelanggan_files/' . $pelangganId; // Direktori penyimpanan

            foreach ($request->file('filename') as $file) {
                if ($file->isValid()) {
                    // Gunakan putFileAs untuk menyimpan file dan mendapatkan nama yang di-hash
                    $filename_original = $file->getClientOriginalName();
                    $filename_stored = $file->hashName(); // Nama file yang aman

                    // Simpan file ke direktori 'multiple_files' di disk 'public'
                    $path = Storage::disk('public')->putFileAs($storage_path, $file, $filename_stored);

                    $files_data[] = [
                        'filename' => $path, // Simpan path yang lengkap
                        // Anda mungkin ingin menambahkan 'filename_original' ke model Anda
                    ];
                }
            }

            Multipleuploads::insert($files_data); // Mass insert [cite: 34]
            return redirect()->route('uploads')->with('success', 'Success: Multiple files uploaded successfully!'); // Ubah feedback

        } else {
            return redirect()->route('uploads')->with('error', 'Gagal: No files uploaded.'); // Ubah feedback [cite: 35]
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Multipleuploads $multipleuploads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Multipleuploads $multipleuploads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Multipleuploads $multipleuploads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Multipleuploads $multipleuploads)
    {
        //
    }
}
