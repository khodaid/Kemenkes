<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('Admin.Home');
    // }

    // public function createBerita()
    // {
    //     return view('Admin.createArticle');
    // }

    // public function store(Request $request)
    // {
    //     $article = new Article;
    //     $article->id = Auth()->id();
    //     $article->title = $request->input('judul');
    //     $article->article = $request->input('content');
    //     $article->photo = $request->input('foto');
    //     $article->save();
    //     return redirect()->route('adminHome')->with('waring','Data tersimpan');
    // }
}
