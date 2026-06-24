<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori;
use App\Models\Kategori_Disco;
use App\Models\Colour_setting;
use App\Models\About;
use App\Models\Discography;
use App\Models\Media;
use App\Models\Galeri;
use App\Models\Galeri_Member;
use App\Models\Member;

class BerandaController extends Controller
{
    public function beranda()
    {
        $media = Media::join('kategori', 'media.kategori', '=', 'kategori.id')
            ->select(
                'media.id',
                'media.created_at as date',
                'kategori.kategori as category',
                'kategori.color as color',
                'media.judul as title',
                'media.thumbnail as image',
                'media.deskripsi as content'
            )
            ->get();
        return view('pages.home', compact('media'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function media()
    {
        $kategori = Kategori::get();
        $media = Media::join('kategori', 'media.kategori', '=', 'kategori.id')
            ->select(
                'media.id',
                'media.created_at as date',
                'kategori.kategori as category',
                'kategori.color as color',
                'media.judul as title',
                'media.thumbnail as image',
                'media.deskripsi as content'
            )
            ->get();

        return view('pages.media', compact('kategori', 'media'));
    }
    public function detailmedia($id)
    {

        $media = Media::find($id);

        return view('pages.dmedia', compact('media'));
    }
    public function member()
    {
        $members = DB::table('member')
            ->join('colour_setting', 'member.color', '=', 'colour_setting.id')
            ->select(
                'member.id',
                'member.nama_kanji as nameJp',
                'member.nama as nameEn',
                'colour_setting.colour_code as color',
                'member.position',
                'member.profil as photo',
                'member.sosmed_ig as instagram',
                'member.sosmed_x as twitter',
                'member.sosmed_titok as tiktok',
                'member.blood_type as bloodType',
                'member.height',
                'member.birthday',
                'member.home_town as hometown'
            )
            ->get();
        return view('pages.member', compact('members'));
    }


    public function discography()
    {
        $disco = Discography::join('kategori_disco', 'discography.kategori_disco', '=', 'kategori_disco.id')
            ->select(
                'discography.id',
                'discography.judul as title',
                'kategori_disco.kategori as type',
                'discography.foto as cover',
                DB::raw("DATE(discography.date_rilis) as releaseDate"),
                DB::raw("'#4883E0' as color")
            )
            ->get();
        return view('pages.discography', compact('disco'));
    }
    public function detaildisco($id)
    {

        $disco = Discography::find($id);

        return view('pages.ddiscography', compact('disco'));
    }
}
