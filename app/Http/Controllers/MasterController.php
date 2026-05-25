<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori;
use App\Models\Kategori_Disco;
use App\Models\Colour_setting;
use App\Models\About;


class MasterController extends Controller
{
    public  function dashboard()
    {
        return view('pages.backend.dashboard');
    }
    public function admin_about()
    {
        $about = About::limit(1)->get();
        return view('pages.backend.about', compact('about'));
    }
    public function edit_about(Request $request, $id)
    {
        $about = About::find($id);

        $data = [
            'judul'      => $request->judul,
            'deskripsi'  => $request->deskripsi,
        ];

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail');

            $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();

            $thumbnail->move(public_path('inputan/thumbnail/img'), $thumbnailName);

            $data['image'] = 'inputan/thumbnail/img/' . $thumbnailName;
        }

        About::where('id', $id)->update($data);

        return response()->json([
            'status'  => 1,
            'message' => 'Data About berhasil diupdate'
        ]);
    }
    public function destroy(About $about)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            // hapus data
            $about->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data About berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    // admin kategori
    public function admin_kategori()
    {
        $kategori = Kategori::get();
        return view('pages.backend.kategori', compact('kategori'));
    }
    public function tambah_kategori(Request $request)
    {

        DB::beginTransaction();

        try {
            $kategori = Kategori::create([
                'kategori' => $request->kategori
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Kategori berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_kategori(Request $request, $id)
    {

        $kategori = Kategori::find($id);
        $data = [
            'kategori' => $request->kategori
        ];
        Kategori::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data kategori berhasil diupdate'
        ]);
    }
    public function kategori_destroy(Kategori $kategori)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($kategori->image && file_exists(public_path($kategori->image))) {
                unlink(public_path($kategori->image));
            }

            // hapus data
            $kategori->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data kategori berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // adminkategori_disco_disco

    public function admin_kategori_disco()
    {
        $kategori_disco = Kategori_Disco::get();
        return view('pages.backend.kategori_disco', compact('kategori_disco'));
    }
    public function tambah_kategori_disco(Request $request)
    {

        DB::beginTransaction();

        try {
            $kategori_disco = Kategori_Disco::create([
                'kategori' => $request->kategori_disco
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'kategori_disco berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_kategori_disco(Request $request, $id)
    {

        $kategori_disco = Kategori_Disco::find($id);
        $data = [
            'kategori' => $request->kategori_disco
        ];
        Kategori_Disco::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data kategori_disco berhasil diupdate'
        ]);
    }
    public function kategori_disco_destroy(Kategori_Disco $kategori_disco)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($kategori_disco->image && file_exists(public_path($kategori_disco->image))) {
                unlink(public_path($kategori_disco->image));
            }

            // hapus data
            $kategori_disco->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data kategori_disco berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    // admin colour_code
    public function admin_color_setting()
    {
        $color_setting = Colour_setting::get();
        return view('pages.backend.color_setting', compact('color_setting'));
    }
    public function tambah_color_setting(Request $request)
    {

        DB::beginTransaction();

        try {
            $color_setting = Colour_setting::create([
                'nama' => $request->nama,
                'colour_code' => $request->colour_code
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'color_setting berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_color_setting(Request $request, $id)
    {

        $color_setting = Colour_setting::find($id);
        $data = [
            'nama' => $request->nama,
            'colour_code' => $request->colour_code
        ];
        Colour_setting::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data color_setting berhasil diupdate'
        ]);
    }
    public function color_setting_destroy(Colour_setting $color_setting)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($color_setting->image && file_exists(public_path($color_setting->image))) {
                unlink(public_path($color_setting->image));
            }

            // hapus data
            $color_setting->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data color_setting berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
