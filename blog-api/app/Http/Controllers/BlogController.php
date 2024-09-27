<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Resources\BlogDetailResource;
use App\Http\Resources\BlogListResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use YajTech\Crud\Controllers\CrudController;

class BlogController extends CrudController
{
    public function __construct()
    {
        parent::__construct(
            Blog::class,
            BlogDetailResource::class,
            BlogListResource::class,
            BlogCreateRequest::class,
            BlogUpdateRequest::class
        );
    }

    public function imageUpload(Request $request)
    {
        // Check if the request has a file named 'image'
        if ($request->hasFile('image')) {
            // Store the image in the 'post_images' directory on the 'public' disk
            $imagePath = $request->file('image')->store('post_images', 'public');

            // Return the stored image path as a response
            return response()->json(['image_path' => $imagePath], 200);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
