<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('Admin.Home', [
            'title' => 'List Article',
            'Article' => $article,
        ]);
    }

    public function createBerita()
    {
        $article = Article::all();
        return view('Admin.createArticle',[
            'title' => 'List Article',
            'Article' => $article,
        ]);
    }

    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('judul');
        $article->article = $request->input('content');
        if ($request->has('photo')) {
            $article->photo = $request->file('photo')->store('GambarBerita');
        }
        $article->save();
        // return redirect()->route('adminHome')->with('waring','Data tersimpan');
        return redirect()->back()->with('waring','Data tersimpan');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if (Storage::exists($article->image)){
            Storage::delete($article->image);
        }
        $article->delete();

        return redirect()->back();
    }

    public function edit()
    {

    }
}
