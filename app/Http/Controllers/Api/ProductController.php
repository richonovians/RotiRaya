<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('checkAdminRole')->only(['store', 'update', 'destroy', 'forceDelete', 'restore']);
    // }    

    // Assign Admin Role to User (only for admin)
    public function makeAdmin()
    {
        // Find user with ID 1
        $user = User::find(1);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User with ID 1 not found.'
            ], 404);
        }

        // Check if the admin role exists, if not, create it
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign admin role to the user
        $user->assignRole($role);

        return response()->json([
            'status' => true,
            'message' => 'User with ID 1 has been assigned the admin role.'
        ]);
    }

    // Get all products (index)
    public function index()
    {
        // Tentukan jumlah produk per halaman (misalnya 10)
        $perPage = 10;
    
        // Ambil produk dengan pagination
        $produks = Produk::paginate($perPage);
    
        // Bersihkan dan pastikan data menggunakan encoding UTF-8 dan encode foto jika diperlukan
        $produks->getCollection()->transform(function ($produk) {
            return [
                'nama_produk' => mb_convert_encoding($produk->nama_produk, 'UTF-8', 'auto'),
                'deskripsi'   => mb_convert_encoding($produk->deskripsi, 'UTF-8', 'auto'),
                'foto'        => $produk->foto ? base64_encode($produk->foto) : null,  // Mengonversi foto ke base64 jika ada
            ];
        });
    
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $produks->items(),  // Data produk yang sudah diproses
            'pagination' => [
                'total' => $produks->total(),           // Total produk
                'current_page' => $produks->currentPage(),  // Halaman saat ini
                'per_page' => $produks->perPage(),         // Jumlah produk per halaman
                'last_page' => $produks->lastPage(),      // Halaman terakhir
                'next_page_url' => $produks->nextPageUrl(), // URL untuk halaman berikutnya
                'prev_page_url' => $produks->previousPageUrl(), // URL untuk halaman sebelumnya
            ]
        ]);
    }
    
    // Show a single product (show)
    public function show($id)
    {
        // Mencari produk berdasarkan ID
        $produk = Produk::find($id);
    
        // Jika produk tidak ditemukan, kirim respons error
        if (!$produk) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
            ], 404);
        }
    
        // Bersihkan dan pastikan data menggunakan encoding UTF-8 dan encode foto jika diperlukan
        $produkData = [
            'nama_produk' => mb_convert_encoding($produk->nama_produk, 'UTF-8', 'auto'),
            'deskripsi'   => mb_convert_encoding($produk->deskripsi, 'UTF-8', 'auto'),
            'foto'        => $produk->foto ? base64_encode($produk->foto) : null,  // Mengonversi foto ke base64 jika ada
        ];
    
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $produkData,
        ]);
    }
    

    // Store a new product (create)
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:1',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->all();
    
        // Pastikan encoding UTF-8 untuk nama_produk dan deskripsi
        $data['nama_produk'] = mb_convert_encoding($data['nama_produk'], 'UTF-8');
        if (isset($data['deskripsi'])) {
            $data['deskripsi'] = mb_convert_encoding($data['deskripsi'], 'UTF-8');
        }
    
        // Tangani gambar (base64)
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $data['foto'] = base64_encode(file_get_contents($file->getRealPath()));  // pastikan data base64 yang valid
        }
    
        // Buat produk baru
        $produk = Produk::create($data);
    
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully.',
            'data' => $produk
        ], 201);
    }
    
    // Update product details (update)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:1',
            'foto' => 'nullable|image|max:2048',  // Foto masih ada di validasi, tapi tidak akan diupdate
        ]);
    
        // Cari produk berdasarkan ID
        $produk = Produk::find($id);
    
        // Jika produk tidak ditemukan, kembalikan error
        if (!$produk) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
            ], 404);
        }
    
        // Ambil data request
        $data = $request->all();
        
        // Pastikan encoding UTF-8 untuk nama_produk dan deskripsi
        $data['nama_produk'] = mb_convert_encoding($data['nama_produk'], 'UTF-8');
        if (isset($data['deskripsi'])) {
            $data['deskripsi'] = mb_convert_encoding($data['deskripsi'], 'UTF-8');
        }
    
        // Jangan memproses foto jika ada, biarkan foto yang lama tetap ada
        if ($request->hasFile('foto')) {
            // Tidak lakukan apa-apa di sini untuk foto, biarkan foto tidak berubah
            unset($data['foto']);  // Hapus foto dari array data sebelum update
        }
    
        // Update produk tanpa memperbarui foto
        $produk->update($data);
    
        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil diubah.',
            'data' => $produk
        ]);
    }
    
    
    // Delete product (destroy)
    public function destroy($id)
    {
        // Mencari produk berdasarkan ID
        $produk = Produk::find($id);
    
        // Jika produk tidak ditemukan, kirim respons error
        if (!$produk) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
            ], 404);
        }
    
        // Hapus produk
        $produk->delete();
    
        return response()->json([
            'status' => true,
            'message' => 'Product berhasil dihapus.',
        ], 200);
    }
    

    // Get trashed (soft deleted) products
    public function trashed()
    {
        // Mengambil produk yang sudah di-soft delete
        $produks = Produk::onlyTrashed()->get();
    
        return response()->json([
            'status' => true,
            'data' => $produks
        ]);
    }
    

    // Restore soft deleted product
    public function restore($id)
    {
        $produk = Produk::onlyTrashed()->findOrFail($id);
        $produk->restore();
        
        return response()->json([
            'status' => true,
            'message' => 'Product restored successfully.'
        ]);
    }

    // Force delete a product permanently
    public function forceDelete($id)
    {
        $produk = Produk::onlyTrashed()->findOrFail($id);
        $produk->forceDelete();

        return response()->json([
            'status' => true,
            'message' => 'Product permanently deleted.'
        ]);
    }
}
