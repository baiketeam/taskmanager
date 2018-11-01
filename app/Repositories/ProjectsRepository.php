<?php

namespace App\Repositories;

use Image;
use App\Project;

class ProjectsRepository
{
    public function create($request)
    {
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumb($request)
        ]);
    }

    public function thumb($request)
    {
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumbs/original', $name);

            // $path = storage_path('app/public/thumbs/cropped/' . $name);
            // Image::make($thumb)->resize(260,100)->save($path);

            return $name;
        }
    }
}