<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Image;
use App\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;


class AudioController extends Controller
{
    /*
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

    $episodes = Audio::orderBy('speaker')->get(); 
      // $speaker = Image::get()->where('id', $episodes->speaker)->first();
    //   $firstname = $episodes->speaker->firstname;
    //   $surname = $episodes->speaker->surname;

    return view('episodes')->with([
        'episodes'=> $episodes
            // 'firstname' => $firstname,
            // 'surname' => $surname
    ]);
    }

    public function showEpisode($id)
    {

    $episode = Audio::get()->where('id', $id)->first();
    $speaker = Image::get()->where('id', $episode->speaker)->first();

    return view('episode')->with([
        'episode' => $episode,
        'speaker' => $speaker
    ]);
    }
    */

    public function dashboard()
    {
        return view('admin.episodesDashboard');
    }

    public function viewEpisodes()
    {
        $episodes = Audio::orderBy('id', 'DESC')->paginate(12); 
        return view('admin.episodesList')->with('episodes', $episodes);
    }

    public function createEpisodeForm()
    {
        $speakers = Image::orderBy('firstname')->get();
        $topics = Topics::orderBy('name')->get(); 
        return view('admin.createEpisodeForm')->with([
            'speakers' => $speakers,
            'topics' => $topics
        ]);
    }

    public function createEpisode(Request $request)
    {
        $name = $request->file('audio')->getClientOriginalName();

        $path = $request->file('audio')->store('audio', 's3');

        Storage::disk('s3')->setVisibility($path, 'public');

        $episode = Audio::create([
            'title' => $request->input('episodeTitle'),
            'topic' => $request->input('episodeTopic'),
            'speaker' => $request->input('episodeSpeaker'),
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path)
        ]);

        Session::flash('message', 'Successfully created!');
        Session::flash('alert-class', 'text-success');
        
        return back();
    }

    public function editEpisodeForm($id)
    {
        $episode = Audio::find($id);
        $speakers = Image::orderBy('firstname')->get();
        $topics = Topics::orderBy('name')->get(); 
        return view('admin.editEpisodeForm')->with([
            'speakers'=> $speakers,
            'episode' => $episode,
            'topics' => $topics

            ]);
    }

    public function editEpisode($id, Request $request)
    {
         //get the speaker
        $episode = Audio::find($id);

        //get the episode filename and url
        $episodeFilename = $episode->filename;
        $episodeFileUrl = $episode->url;

         //the file path
        $originalPath = 'audio/' . $episodeFilename;

        if ($request->hasFile('audio')) {
            $name = $request->file('audio')->getClientOriginalName();
            $path = $request->file('audio')->store('audio', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');

            //update the audio with the new one
            $episode->filename = basename($path);
            $episode->url = Storage::disk('s3')->url($path);

            if($request->filled('episodeTitle')) {
                $episode->title = $request->input('episodeTitle');
            }

            if($request->filled('episodeTopic')) {
                $episode->topic = $request->input('episodeTopic');
            }
            if($request->has('episodeSpeaker')) {
                $episode->speaker = $request->input('episodeSpeaker');
            }

             //then delete the original image
            Storage::disk('s3')->delete($originalPath);
        } 
        else {
         //update only these records
        if($request->filled('episodeTopic')) {
            $episode->topic = $request->input('episodeTopic');
        }

        if($request->has('episodeSpeaker')) {
            $episode->speaker = $request->input('episodeSpeaker');
        }

        if($request->filled('episodeTitle')) {
            $episode->title = $request->input('episodeTitle');
        }
        
        
        }

        $episode->save();

        Session::flash('message', 'Successfully updated!');
        Session::flash('alert-class', 'text-success');

        return back();
    }

    public function deleteEpisode($id)
    {
        //get the episode
        $episode = Audio::find($id);

        //get the episode filename and url
        $episodeFilename = $episode->filename;
        $episodeFileUrl = $episode->url;

        //the file path
        $path = 'audio/' . $episodeFilename;

        //delete the image from s3
        Storage::disk('s3')->delete($path);

        //delete from database
        $episode->delete();

        Session::flash('message', 'successfully deleted');
        Session::flash('alert-danger', 'text-danger');

        return back();
    }

    //front-end starts here
    public function showEpisodes()
    {
        $episodes = Audio::orderBy('speaker')->paginate(15); 
        return view('episodes')->with('episodes', $episodes);
    }

    public function showEpisode($id)
    {
        $episode = Audio::find($id);
        return view('episode')->with('episode', $episode);
    }

    public function recentEpisodes()
    {
        $episodes = Audio::orderBy('created_at', 'DESC')->paginate(15); 
        return view('recentEpisodes')->with('episodes', $episodes);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $episodes = Audio::where('title', 'LIKE', '%' . $q . '%')->paginate(15);
        // if(count($episodes) > 0)
        return view('episodes')->with('episodes', $episodes);

        //else return view ('episodes')->withMessage('No Details found. Try to search again !');
    }
    
}
