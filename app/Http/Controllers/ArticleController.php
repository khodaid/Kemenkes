<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('Admin.Berita.Home', [
            'title' => 'List Article',
            'Article' => $article,
        ]);
    }

    public function createBerita()
    {
        $article = Article::all();
        return view('Admin.Berita.createArticle',[
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
        if (Storage::exists($article->photo)){
            Storage::delete($article->photo);
        }
        $article->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('Admin.Berita.editArticle', [
            'title' => 'Edit Berita' . $id,
            'Article' => $article,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required|min:6',
            'content'=>'required|min:50',
        ]);

        $article = Article::find($id);

        $photo = $article->photo;

        if ($request->hasFile('photo')) {
            if (Storage::exists($article->photo)) {
                Storage::delete($article->photo);
            }
            $photo = $request->file('photo')->store('GambarBerita');
        }

        $article->id = auth()->id();
        $article->title = $request->title;
        $article->article = $request->article;

        $article->save();

        return redirect()->route('Admin.Berita.Home')->with('info', 'Data Terupdate');
    }
}
