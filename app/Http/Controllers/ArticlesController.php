<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show($id)
    //public function show(Article $article)
    {
        //behind the scenes automatically
        //Article::where('id', 1)->first();
        //dd($id);

        $article = Article::where('id', $id)->firstOrFail();
        return view('articles.show', [
            'article' => $article
        ]);
        //$article = Article::findOrFail($id);
        /* return view('articles.show', [
            'article' => $article
        ]); */
    }

    public function create()
    {
        /* $article = Article::latest()->firstOrFail();
        return view('articles.create', [
            'article' => $article
        ]); */
        return view('articles.create');
    }

    public function store()
    {
        //die('hello');
        //dump(request()->all());
        /* request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]); */

        /* $validatedAttributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        Article::create($validatedAttributes); */

        //in eigener Methode:
        Article::create($this->validateArticle());

        /* $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save(); */

        /* Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body')
        ]); */

        return redirect('/articles');
    }

    public function edit($id)
    //public function edit(Article $article)
    {
        $article = Article::find($id);
        return view('articles.edit', [
            'article' => $article
        ]);
        //return view('articles.edit', compact('article'));
    }

    public function update($id)
    //public function update(Article $article)
    {
        /* $validatedAttributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $article->update($validatedAttributes); */

        //in eigener Methode:
        //Article::cupdate($this->validateArticle());

        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);
    }

    public function destroy()
    {
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
