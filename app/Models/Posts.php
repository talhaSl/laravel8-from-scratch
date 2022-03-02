<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug)
    {
        // $path = __DIR__ . "/../resources/posts/{$slug}.html";

        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            // abort(404);
            // return redirect('/');
            throw new ModelNotFoundException();
        }
        // dd($path);
        return  cache()->remember("posts.{$slug}", 5, function () use ($path) {
            return file_get_contents($path);
        });
    }

    public static function all()
    {
        $files= File::files(resource_path("posts/"));

        return array_map(function($file){
            return $file->getContents();
        },$files);
    }
}
