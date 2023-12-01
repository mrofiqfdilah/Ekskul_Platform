<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eskul;
use Illuminate\Support\Facades\Auth;
use App\Models\Gabung;

class GabungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Dapatkan data pengguna yang telah mendaftar ke ekskul bersama dengan ekskul yang diikuti
    $gabungData = Gabung::with(['user', 'ekskul'])->get();

    return view('gabung.index', compact('gabungData'));
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
   /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $request->validate([
        'user_id' => 'required', // Pastikan user_id terkait
        'ekskul_id' => 'required', // Pastikan ekskul_id terkait
    ]);

     // Periksa apakah user sudah terdaftar di ekskul yang sama
     $existingGabung = Gabung::where('user_id', $request->user_id)
     ->where('ekskul_id', $request->ekskul_id)
     ->first();

 if ($existingGabung) {
     return redirect()->back()->with('error', 'Anda sudah terdaftar di ekskul ini.');
 }

    // Buat entri baru dalam tabel 'gabung' berdasarkan data yang diterima dari formulir
    $gabung = new Gabung([
        'user_id' => $request->input('user_id'),
        'ekskul_id' => $request->input('ekskul_id'),
    ]);

    $gabung->save();

    // Redirect ke halaman yang sesuai, misalnya, halaman eskul atau halaman konfirmasi
    // Gantilah 'nama_route' dengan nama rute yang sesuai dalam aplikasi Anda.
    return back()->with('success', 'Berhasil Bergabung!');
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
        $gabung = Gabung::find($id);
        $gabung->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
