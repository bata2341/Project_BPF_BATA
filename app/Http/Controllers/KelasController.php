<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelas::with('waliKelas');
        
        if ($request->has('q')) {
            $query->where('nama_kelas', 'like', '%' . $request->q . '%')
                  ->orWhere('tingkat', 'like', '%' . $request->q . '%')
                  ->orWhereHas('waliKelas', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->q . '%')
                          ->orWhere('email', 'like', '%' . $request->q . '%');
                  });;
        }
        
        $kelas = $query->paginate(10);
        return view('kelas_index', compact('kelas'));
    }
    
    public function create()
    {
        // Only get users with role 'wali_kelas'
        $guru = User::where('role', 'wali_kelas')->get();
        return view('kelas.create', compact('guru'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => [
                'required',
                'string',
                'max:50',
                'unique:kelas,nama_kelas',  // Prevent duplicate class names regardless of grade
            ],
            'tingkat' => 'required|integer|between:1,6',
            'wali_kelas_id' => [
                'nullable',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $user = User::find($value);
                        if ($user->role !== 'wali_kelas') {
                            $fail('Wali kelas harus memiliki role wali_kelas.');
                        }
                        
                        // Check if user is already assigned as wali kelas
                        $existingKelas = Kelas::where('wali_kelas_id', $value)->exists();
                        if ($existingKelas) {
                            $fail('User ini sudah menjadi wali kelas untuk kelas lain.');
                        }
                    }
                },
            ]
        ]);
        
        Kelas::create($validated);
        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }
    
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus');
    }
}