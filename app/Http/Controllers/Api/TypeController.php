<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\type;
use App\Transformers\TypeTransformer;

class TypeController extends Controller
{
    public function index()
    {
        $type = type::all();
        return TypeTransformer::transform($type);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
        ]);
        $type = new type();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();
        return TypeTransformer::transform($type);
    }
    public function update(Request $request, Type $type)
    {
        $request->validate([
            "name" => "required|string",
            "description" => 'required|string',
        ]);
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return TypeTransformer::transform($type);
    }
    public function delete(Type $type)
    {
        $type->delete();
        return response()->json('done!', 200);
    }
    public function view($id)
    {
        $type = type::find($id);
        return TypeTransformer::transform($type);
    }
}
