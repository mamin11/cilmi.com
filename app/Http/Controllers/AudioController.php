<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AudioController extends Controller
{
    public function create() 
    {
        return view('test');
    }

    public function store(Request $request) 
    {
        //$path = $request->file('audio')->store('audio')->storeAs('name');
         $name = $request->file('audio')->getClientOriginalName();
       $data = [
           'name' => $request->input('name'),
           'topic' => $request->input('topic'),
           'speaker' => $request->input('speaker')
        
        ];

        // $name = $request->input('name');
        // $topic = $request->input('topic');
        // $speaker = $request->input('speaker');
        // $path = $request->file('audio')->storeAs(
        //     'audio', $name, 's3'
        // );
        //$path = Input::file('audio')->getRealPath();
        $path = $request->file('audio')->store('audio', 's3');

        //set to public - anyone can access the file using its s3 link
        Storage::disk('s3')->setVisibility($path, 'public');

        $audio = Audio::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path),
            'topic' => $request->input('topic'),
            //add the speaker firstname and surname **********************
            'speaker' => $request->input('speaker')
        ]);

        // var_dump($data);
        return $audio;
    }

    public function show(Audio $audio)
    {
        //return Storage::disk('s3')->response('audio/'. $audio->filename);
       
       // return $audio->url;

       
       $episodes = Audio::orderBy('firstname')->get(); 

       return view('episodes')->with('episodes', $episodes);
    }

    public function showEpisode($id)
    {

       $episode = Audio::where('id', $id)->first();
       $speaker = Image::get()->where('id', $episode->speakerId)->first();

       return view('episode')->with([
           'episode' => $episode,
           'speaker' => $speaker
       ]);
    }
}
