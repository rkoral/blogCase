<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::where('deleted_at', null)->get();
        return view('back-views.article.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('deleted_at', null)->get();
        return view('back-views.article.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->article_title = $request->input('article_title');
        $article->article_content = $request->input('article_content');
        $article->category_id = $request->input('category_id');
        $article->save();
        return redirect()->route('admin.article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $article = Article::find($request->route('id'));
        $categories = Category::where('deleted_at', null)->get();

        return view('back-views.article.view', compact('categories', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $article = Article::find($request->route('id'));
        $categories = Category::where('deleted_at', null)->get();

        return view('back-views.article.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($request->route('id'));
        $article->article_title = $request->input('article_title');
        $article->article_content = $request->input('article_content');
        $article->category_id = $request->input('category_id');
        $article->save();
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $article = Article::find($request->route('id'));
        $article->deleted_at = Carbon::now();
        $article->save();
        return redirect()->route('admin.article.index');
    }
}
