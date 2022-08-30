<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(Request $request) {
        $category = Category::where('category_name', $request->route('category_name'))->first();
        $articles = Article::where('category_id', $category->id)->where('deleted_at', null)->get();
        return view('front-views.article', compact('articles', 'category'));
    }
}
