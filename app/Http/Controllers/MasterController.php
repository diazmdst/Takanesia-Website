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
use App\Models\Media;
use App\Models\Galeri;
use App\Models\Galeri_Member;
use App\Models\Member;

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
    // media
    public function admin_media()
    {
        $media = Media::get();
        $kategori = Kategori::get();
        $kategoris = Kategori::get();
        return view('pages.backend.media', compact('media', 'kategori', 'kategoris'));
    }
    public function tambah_media(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();
                $thumbnail->move(public_path('inputan//media/thumbnail/'), $thumbnailName);
                $thumbnailPath = 'inputan/media/thumbnail/' . $thumbnailName;
            }
            $media = Media::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori_id,
                'thumbnail' =>  $thumbnailPath
            ]);

            $media_id = $media->id;
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('inputan/media/detailimg'), $fileName);

                    Galeri::create([
                        'media_id' => $media_id,
                        'foto'     => $fileName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'media berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_media(Request $request, $id)
    {

        // $thumbnailPath = null;
        // if ($request->hasFile('thumbnail')) {
        //     $thumbnail = $request->file('thumbnail');
        //     $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();
        //     $thumbnail->move(public_path('inputan/thumbnail/img'), $thumbnailName);
        //     $thumbnailPath = 'inputan/thumbnail/img/' . $thumbnailName;
        // }
        $media = Media::find($id);
        $data =
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori_id,
            ];

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('inputan/thumbnail/img'), $thumbnailName);

            $data['thumbnail'] = 'inputan/thumbnail/img/' . $thumbnailName;
        }

        Media::where('id', $id)->update($data);
        $media_id = $id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inputan/media/detailimg/'), $fileName);

                Galeri::create([
                    'media_id' => $media_id,
                    'foto'     => $fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        Media::where('id', $id)->update($data);
        return response()->json([
            'status' => 1,
            'message' => 'Produk berhasil diupdate'
        ]);
    }
    public function edit_foto_item(Request $request, $id)
    {
        // dd($request->all());

        $item = Media::find($id);
        $data = [];
        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('inputan/thumbnail/img'), $thumbnailName);

            $data['thumbnail'] = 'inputan/thumbnail/img/' . $thumbnailName;
        }

        Media::where('id', $id)->update($data);
        $media_id = $id;
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inputan/media/detailimg/'), $fileName);

                Media::create([
                    'produk_id' => $media_id,
                    'foto'     => $fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        return response()->json([
            'status' => 1,
            'message' => 'Media berhasil diupdate'
        ]);
    }
    public function media_destroy(Media $media)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($media->image && file_exists(public_path($media->image))) {
                unlink(public_path($media->image));
            }
            // hapus galeri jika ada
            $galeris = Galeri::where('media_id', $media->id)->get();

            foreach ($galeris as $galeri) {

                // hapus file gambar galeri
                $path = public_path('inputan/media/detailimg/' . $galeri->foto);

                if (file_exists($path)) {
                    unlink($path);
                }

                $galeri->delete();
            }
            // hapus data
            $media->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data media berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function deletePicture($id)
    {
        $picture = Galeri::findOrFail($id);

        // hapus file fisik
        $filePath = public_path('inputan/media/detailimg/' . $picture->foto);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $picture->delete();

        return response()->json([
            'success' => true
        ]);
    }
    //admin member
    public function admin_member()
    {
        $member = Member::get();
        $color_setting = Colour_setting::get();
        $color_settings = Colour_setting::get();
        return view('pages.backend.member', compact('member', 'color_setting', 'color_settings'));
    }
    public function tambah_member(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('profil')) {
                $thumbnail = $request->file('profil');
                $thumbnailName = uniqid() . '_profil_' . $thumbnail->getClientOriginalName();
                $thumbnail->move(public_path('inputan//media/profil/'), $thumbnailName);
                $thumbnailPath = 'inputan/media/profil/' . $thumbnailName;
            }

            $member = Member::create([
                'nama' => $request->nama,
                'nama_kanji' => $request->nama_kanji,
                'sosmed_x' => $request->sosmed_x,
                'sosmed_ig' => $request->sosmed_ig,
                'sosmed_titok' => $request->sosmed_titok,
                'profil' =>  $thumbnailPath,
                'color' => $request->color_setting_id,
            ]);
            $member_id  = $member->id;
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('inputan/member/detailimg'), $fileName);

                    Galeri_Member::create([
                        'member_id' => $member_id,
                        'foto'     => $fileName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'member berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_member(Request $request, $id)
    {

        $member = Member::find($id);
        $data = [
            'nama' => $request->nama,
            'nama_kanji' => $request->nama_kanji,
            'sosmed_x' => $request->sosmed_x,
            'sosmed_ig' => $request->sosmed_ig,
            'sosmed_titok' => $request->sosmed_titok,
            'color' => $request->color_setting_id,
        ];

        if ($request->hasFile('profil')) {

            $thumbnail = $request->file('profil');
            $thumbnailName = uniqid() . '_profil_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('inputan/profil/img'), $thumbnailName);

            $data['profil'] = 'inputan/profil/img/' . $thumbnailName;
        }
        Member::where('id', $id)->update($data);
        $member_id = $id;
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inputan/member/detailimg/'), $fileName);

                Galeri_Member::create([
                    'member_id' => $member_id,
                    'foto'     => $fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        Member::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data member berhasil diupdate'
        ]);
    }
    public function member_destroy(Member $member)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($member->profil && file_exists(public_path($member->profil))) {
                unlink(public_path($member->profil));
            }

            // hapus data
            $member->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data member berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function deletePictureMember($id)
    {
        $picture = Galeri_Member::findOrFail($id);

        // hapus file fisik
        $filePath = public_path('inputan/member/detailimg/' . $picture->foto);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $picture->delete();

        return response()->json([
            'success' => true
        ]);
    }

    //login
    public function halamanlogin()
    {

        return view('layouts.login');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'redirect' => route('HalamanDashboard') // sesuaikan route tujuan
            ]);
        }
        // Password salah
        return response()->json([
            'success' => false,
            'message' => 'Password salah! Silakan coba lagi.'
        ], 401);
    }
    public function user_logout(Request $request)
    {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
