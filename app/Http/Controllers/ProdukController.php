<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ProdukController extends Controller
{
    
    //membuat id 1 menjadi admin
    public function makeAdmin()
    {
        // Find user with ID 1
        $user = User::find(1);

        if (!$user) {
            return "User with ID 1 not found.";
        }

        // Check if the admin role exists, if not, create it
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign admin role to the user
        $user->assignRole($role);

        return "User with ID 1 has been assigned the admin role.";
    }


    public function index()
    {
        // Ambil semua data produk dari database
        $produks = Produk::all();

        // Kirim data ke view
        return view('products.index', compact('produks'));
    }

    // Menampilkan form tambah produk (CREATE)
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan data produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:1',
            'foto' => 'nullable|image|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi!',
            'harga.required' => 'Harga produk harus diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'harga.min' => 'Harga produk minimal adalah 1!',
            'stok.required' => 'Stok produk harus diisi!',
            'stok.integer' => 'Stok harus berupa angka!',
            'stok.min' => 'Stok produk minimal adalah 1!',
            'foto.image' => 'Foto produk harus berupa gambar!',
            'foto.max' => 'Foto produk maksimal 2MB!',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $data['foto'] = file_get_contents($file->getRealPath());
        }

        Produk::create($data);

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan!');
    }


    // Menampilkan form edit produk (UPDATE)
    public function edit(Produk $produk)
    {
        return view('products.edit', compact('produk'));
    }

    // Mengupdate data produk di database
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'foto'        => 'nullable|image|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'harga.required'       => 'Harga wajib diisi.',
            'stok.required'        => 'Stok wajib diisi.',
            'foto.image'           => 'File yang diunggah harus berupa gambar.',
            'foto.max'             => 'Ukuran gambar maksimal adalah 2MB.',
        ]);
    
        // Proses data valid
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = file_get_contents($request->file('foto')->getRealPath());
        }
        $produk->update($data);
    
        return redirect()->route('produk')->with('success', 'Perubahan berhasil disimpan!');
    }
       


    // Menghapus produk (DELETE)
    public function destroy(Produk $produk)
    {
        $produk->delete(); // Menghapus secara soft delete
        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus!');
    }

    public function trashed()
    {
        $produks = Produk::onlyTrashed()->get(); // Mengambil produk yang dihapus (soft deleted)
        return view('products.trashed', compact('produks')); // Mengirim data produk yang dihapus ke view
    }

    public function restore($id)
    {
        $produk = Produk::onlyTrashed()->findOrFail($id); // Temukan produk yang telah dihapus
        $produk->restore(); // Mengembalikan produk
        return redirect()->route('produk.trashed')->with('success', 'Produk berhasil dikembalikan!'); // Redirect ke halaman produk dengan pesan sukses
    }
    
    public function forceDelete($id)
    {
        $produk = Produk::onlyTrashed()->findOrFail($id); // Temukan produk yang dihapus
        $produk->forceDelete(); // Menghapus produk secara permanen
        return redirect()->route('produk.trashed')->with('success', 'Produk berhasil dihapus permanen!'); // Redirect ke halaman produk dengan pesan sukses
    }
    
}
