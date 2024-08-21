<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\StorePostRequest;
use App\Http\Requests\Api\UpdatePostequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Auth::user()->posts()->with('tags')->orderBy('pinned')->get();
        return ApiResponse::sendResponse($posts, 'User posts retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('cover_image')) {
            $validatedData['cover_image'] = $request->file('cover_image')->store('/post');
        }
        $post = Auth::user()->posts()->create($validatedData);

        $post->tags()->attach($request->tags);

        return ApiResponse::sendResponse($post, 'Post created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return ApiResponse::sendResponse([], 'Not Found Dat', 404);
        }

        return ApiResponse::sendResponse($post->load('tags'), 'Post retrieved successfully', 200);
    }



    public function update(UpdatePostequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return ApiResponse::sendResponse([], 'Not Found Data', 404);
        }

        $validatedData = $request->validated();

        if ($request->hasFile('cover_image')) {

            if ($post->cover_image) {
                Storage::delete($post->cover_image);
            }

            $validatedData['cover_image'] = $request->file('cover_image')->store('/post');
        }

        $post->update($validatedData);
        return ApiResponse::sendResponse($post->load('tags'), 'Post updated successfully', 200);
    }


    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return ApiResponse::sendResponse([], 'Not Found Data', 404);
        }
        $post->delete();

        return ApiResponse::sendResponse([], 'Post deleted successfully', 200);
    }
    public function trashed()
    {
        $posts = Auth::user()->posts()->onlyTrashed()->get();

        if ($posts->isEmpty()) {
            return ApiResponse::sendResponse([], 'No trashed posts found', 200);
        }
        return ApiResponse::sendResponse($posts, 'Trashed posts retrieved successfully', 200);
    }
    public function restore($id)
    {
        $post = Auth::user()->posts()->onlyTrashed()->where('id', $id)->first();

        if (!$post) {
            return ApiResponse::sendResponse([], 'Post Not Found', 404);
        }

        $post->restore();
        return ApiResponse::sendResponse($post, 'Post restored successfully', 200);
    }
}