<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create() 
    {
        return view('testImage');
    }

    public function store(Request $request) 
    {
       $name = $request->file('images')->getClientOriginalName();

    //    $data = [
    //        'name' => $request->input('name'),
    //        'topic' => $request->input('topic'),
    //        'speaker' => $request->input('speaker')
        
    //     ];

        $path = $request->file('images')->store('images', 's3');

        Storage::disk('s3')->setVisibility($path, 'public');

        $image = Image::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path),
            'firstname' => $request->input('firstname'),
            'surname' => $request->input('surname')
        ]);

        // var_dump($data);
        return $image;
    }

    public function show(Image $image)
    {
        //return Storage::disk('s3')->response('images/'. $image->filename);
       
       // return $image->url;

       $speakers = Image::orderBy('firstname')->get(); 
       //$profileImage = Storage::disk('s3')->response('images/'. $speakers->filename);
      // $blogs = Posts::orderBy('updated_at', 'desc')->take(4)->paginate(4);
    //    $data = [
    //        'image' => $image,
    //        'blogs' => $blogs
    //    ];
       return view('speakers')->with('speakers', $speakers);
    }}
