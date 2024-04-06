<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\writer;
use App\Transformers\WriterTransformer;
use Symfony\Component\EventDispatcher\Debug\WrappedListener;

class WriterController extends Controller
{
    public function index()
    {
        $writer = writer::all();
        return WriterTransformer::transform($writer);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        $writer = new writer;
        $writer->name =  $request->name;
        $writer->about_writer = $request->about_writer;
        $writer->save();
        return WriterTransformer::transform($writer);
    }
    public function view($id)
    {
        $writer = Writer::find($id);
        return WriterTransformer::transform($writer);
    }
    public function update(Request $request, writer $writer)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        $writer->name = $request->name;
        $writer->about_writer = $request->about_writer;
        $writer->save();
        return WriterTransformer::transform($writer);
    }
    public function delete(writer $writer)
    {
        $writer->delete();
        return response()->json('done!', 200);
    }
}
