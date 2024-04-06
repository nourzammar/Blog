<?php

namespace App\Http\Controllers\Api;

use App\ArticleWriter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\writer;
use App\Transformers\ArticleTransformer;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::with('types')->get();
        return  ArticleTransformer::transform($articles);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'contant' => 'required|string',
            'typeId' => 'required|integer|exists:types,id'
        ]);
        $article = new Article();
        $article->name = $request->name;
        $article->contant = $request->contant;
        $article->type_id = $request->typeId;
        $article->save();
        $article->writers()->syncWithoutDetaching($request->writerId);            
        $article->keywords()->syncWithoutDetaching($request->keywordId);            
        return $article;
    }
    public function delete(article $article)
    {
        $article->delete();
        return response()->json('done!', 200);
    }
    public function view($id)
    {
        $article = article::find($id);
        return ArticleTransformer::transform($article);
    }
    public function update(Request $request, article $article)
    {
        $request->validate([
            'name' => 'required|string',
            'contant' => 'required|string',
            'typeId' => 'required|integer|exists:types,id'
        ]);
        $article->name = $request->name;
        $article->contant = $request->contant;
        $article->type_id = $request->typeId;
        $article->save();
        return ArticleTransformer::transform($article);
    }
}
