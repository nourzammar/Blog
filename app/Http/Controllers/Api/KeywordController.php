<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\keyword;
use App\Transformers\KeywordTransformer;

class KeywordController extends Controller
{
    public function index()
    {
        $keyword = keyword::all();
        return KeywordTransformer::transform($keyword);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        $keyword = new keyword();
        $keyword->name = $request->name;
        $keyword->save();
        return KeywordTransformer::transform($keyword);
    }
    public function view($id)
    {
        $keyword = keyword::find($id);
        return KeywordTransformer::transform($keyword);
    }
    public function update(Request $request, keyword $keyword)
    {
        $request->validate([
            "name" => "required|string"
        ]);
        $keyword->name = $request->name;
        $keyword->save();
        return KeywordTransformer::transform($keyword);
    }
    public function delete(keyword $keyword)
    {
        $keyword->delete();
        return KeywordTransformer::transform($keyword);
    }
}
