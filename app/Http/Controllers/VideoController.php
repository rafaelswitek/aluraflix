<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        return response()
            ->json(Video::create($request->all()), 201);
    }

    public function index()
    {
        return response()
            ->json(Video::all(), 200);
    }

    public function show(int $id)
    {
        $video = Video::find($id);
        if (is_null($video)) {
            return response()
                ->json('', 204);
        }

        return response()
            ->json($video, 200);
    }

    public function update(int $id, Request $request)
    {
        $video = Video::find($id);
        if (is_null($video)) {
            return response()
                ->json([
                    "error" => "Recurso não encontrado"
                ], 404);
        }
        $video->fill($request->all());
        $video->save();

        return response()
            ->json($video, 200);
    }

    public function destroy(int $id)
    {
        $video = Video::destroy($id);

        if ($video === 0) {
            return response()
                ->json([
                    "error" => "Recurso não encontrado"
                ], 404);
        }

        return response()
            ->json('', 204);
    }
}
