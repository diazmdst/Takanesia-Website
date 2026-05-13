<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        return view('pages.home');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function media()
    {
        return view('pages.media');
    }
    public function member()
    {
        return view('pages.member');
    }

    public function discography()
    {
        return view('pages.discography');
    }
}
