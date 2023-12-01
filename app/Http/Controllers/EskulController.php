<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eskul;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Gabung;
use Illuminate\Support\Facades\Session;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('eskul.index')->with([ 'eskul' => Eskul::paginate(4), ]);
    }

    public function daftar($namaeskul)
{
    $eskul = Eskul::where('namaeskul', $namaeskul)->first(); // Mengambil data Eskul berdasarkan namaeskul

    // Tambahkan logika untuk memeriksa apakah user sudah terdaftar
    $alreadyJoined = Gabung::where('user_id', auth()->user()->id)
        ->where('ekskul_id', $eskul->id)
        ->exists();

    if ($eskul) {
        return view('daftar', compact('eskul', 'alreadyJoined'));
    } else {
        return abort(404); // Handle jika data tidak ditemukan (misalnya, menampilkan halaman error 404).
    }
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = User::where('is_guru', 1)
            ->whereNotIn('id', Eskul::pluck('guru_id')->toArray())
            ->get();
        
        return view('eskul.create', compact('gurus'));
    }    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'namaeskul' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required|image',
        'jadwaltempat' => 'required',
        'guru_id' => 'required', // Tambahkan validasi untuk guru_id
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() .'_'. $slug;
        $gambar->move('uploads/eskul/' , $new_gambar);

        $eskul = new Eskul;
        $eskul->namaeskul = $request->namaeskul;
        $eskul->deskripsi = $request->deskripsi;
        $eskul->jadwaltempat = $request->jadwaltempat;
        $eskul->gambar = 'uploads/eskul/' . $new_gambar;
        $eskul->guru_id = $request->guru_id; // Simpan ID guru
        $eskul->save();

        return redirect()->route('eskul.index')->with('success','Data Berhasil Ditambah');
        
    }

    public function edit(string $id)
    {
        $eskul = Eskul::find($id);
        $gurus = User::where('is_guru', 1)->get(); // Mengambil semua pengguna yang memiliki 'is_guru' bernilai 1
    
        // Seleksi ID guru yang saat ini ditetapkan
        $selectedGuru = $eskul->guru_id;
    
        return view('eskul.edit', compact('eskul', 'gurus', 'selectedGuru'));
    }
    



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaeskul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
            'jadwaltempat' => 'required',
            'guru_id' => 'required', // Tambahkan validasi untuk guru_id
            ]);
    
            $gambar = $request->gambar;
            $slug = Str::slug($gambar->getClientOriginalName());
            $new_gambar = time() .'_'. $slug;
            $gambar->move('uploads/eskul/' , $new_gambar);
    
            $eskul = Eskul::find($id);
            $eskul->namaeskul = $request->namaeskul;
            $eskul->deskripsi = $request->deskripsi;
            $eskul->jadwaltempat = $request->jadwaltempat;
            $eskul->gambar = 'uploads/eskul/' . $new_gambar;
            $eskul->guru_id = $request->guru_id; // Simpan ID guru
            $eskul->save();
    
            return redirect()->route('eskul.index')->with('success','Data Berhasil Ditambah');
    }


    public function home()
    {
        return view('home')->with([ 'eskul' => Eskul::all(), ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eskul = Eskul::find($id);
        $eskul->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }


    public function guru()
    {
        return view('guru');
    }
}
