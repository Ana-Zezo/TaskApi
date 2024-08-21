<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreTagRequest;
use App\Http\Requests\Api\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return ApiResponse::sendResponse($tags, 'Tags retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return ApiResponse::sendResponse($tag, 'Tag created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        if (!$tag)
            return ApiResponse::sendResponse(null, 'Not Found Dat', 404);
        return ApiResponse::sendResponse($tag, 'Tag retrieved successfully', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        if (!$tag)
            return ApiResponse::sendResponse(null, 'Not Found Dat', 404);


        $tag->update([
            'name' => $request->name,
        ]);
        return ApiResponse::sendResponse($tag, 'Tag updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if (!$tag)
            return ApiResponse::sendResponse(null, 'Not Found Dat', 404);
        $tag->delete();

        return ApiResponse::sendResponse([], 'Tag deleted successfully', 200);
    }
}