<?php

namespace App\Http\Controllers;

use App\Image;
use App\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class ImageController extends Controller
{
    // public function create() 
    // {
    //     return view('testImage');
    // }

    // public function store(Request $request) 
    // {
    // $name = $request->file('images')->getClientOriginalName();

    // //    $data = [
    // //        'name' => $request->input('name'),
    // //        'topic' => $request->input('topic'),
    // //        'speaker' => $request->input('speaker')
        
    // //     ];

    //     $path = $request->file('images')->store('images', 's3');

    //     Storage::disk('s3')->setVisibility($path, 'public');

    //     $image = Image::create([
    //         'filename' => basename($path),
    //         'url' => Storage::disk('s3')->url($path),
    //         'firstname' => $request->input('firstname'),
    //         'surname' => $request->input('surname')
    //     ]);

    //     // var_dump($data);
    //     return $image;
    // }

    // public function show(Image $image)
    // {
    //     //return Storage::disk('s3')->response('images/'. $image->filename); 
    //    // return $image->url;

    // $speakers = Image::orderBy('firstname')->get(); 
    //    //$profileImage = Storage::disk('s3')->response('images/'. $speakers->filename);
    //   // $blogs = Posts::orderBy('updated_at', 'desc')->take(4)->paginate(4);
    // //    $data = [
    // //        'image' => $image,
    // //        'blogs' => $blogs
    // //    ];
    // return view('speakers')->with('speakers', $speakers);
    // }

    public function dashboard()
    {
        return view('admin.speakerDashboard');
    }

    public function viewSpeakers()
    {
        $speakers = Image::orderBy('firstname')->paginate(12);
        return view('admin.speakersList')->with('speakers', $speakers);
    }

    public function createSpeakerForm()
    {
        return view('admin.createSpeakerForm');
    }

    public function createSpeaker(Request $request)
    {
        if ($request->hasFile('images')) {
            $name = $request->file('images')->getClientOriginalName();

            $path = $request->file('images')->store('images', 's3');

            Storage::disk('s3')->setVisibility($path, 'public');

            $FILENAME = basename($path);
            $URL = Storage::disk('s3')->url($path);
        } 
        else {
            $path = '';
            $FILENAME = '';
            $URL = '';
        }

        // var_dump($data);
        //return $image;

        $speaker = Image::create([
            'firstname' => $request->input('speakerFirstname'),
            'surname' => $request->input('speakerSurname'),
            'filename' => $FILENAME,
            'url' => $URL
        ]);

        Session::flash('message', 'Successfully created!');
        Session::flash('alert-class', 'text-success');
        
        return back();
    }

    public function editSpeakerForm($id, Request $request)
    {
        $speaker = Image::find($id);
        return view('admin.editSpeakerForm')->with('speaker', $speaker);
    }

    public function editSpeaker($id, Request $request)
    {
                //get the speaker
                $speaker = Image::find($id);

                //get the speaker image
                $speakerImageFilename = $speaker->filename;
                $speakerImageFileUrl = $speaker->url;
        
                //the file path
                $originalPath = 'images/' . $speakerImageFilename;

                if ($request->hasFile('images')) {
                    $name = $request->file('images')->getClientOriginalName();
                    $path = $request->file('images')->store('images', 's3');
                    Storage::disk('s3')->setVisibility($path, 'public');

                    //update the image with the new one
                    $speaker->filename = basename($path);
                    $speaker->url = Storage::disk('s3')->url($path);

                    if($request->filled('speakerFirstName')) {
                        $speaker->firstname = $request->input('speakerFirstName');
                    }
                    if($request->has('speakerSurName')) {
                        $speaker->surname = $request->input('speakerSurName');
                    }

                    //then delete the original image
                    Storage::disk('s3')->delete($originalPath);
                } 
                else {
                //update only these records
                if($request->filled('speakerFirstName')) {
                    $speaker->firstname = $request->input('speakerFirstName');
                   // $speaker->save();
                }

                if($request->has('speakerSurName')) {
                    $speaker->surname = $request->input('speakerSurName');
                   // $speaker->save();
                }
                
                
                }

                $speaker->save();

                Session::flash('message', 'Successfully updated!');
                Session::flash('alert-class', 'text-success');

                return back();
    }

    public function deleteSpeaker($id)
    {
        //get the speaker
        $speaker = Image::find($id);

        //get the speaker image
        $speakerImageFilename = $speaker->filename;
        $speakerImageFileUrl = $speaker->url;

        //the file path
        $path = 'images/' . $speakerImageFilename;

        //delete the image from s3
        Storage::disk('s3')->delete($path);

        //delete from database
        $speaker->delete();

        Session::flash('message', 'successfully deleted');
        Session::flash('alert-danger', 'text-danger');

        return back();
        //var_dump($speaker);
        //return $path;
    }




    //front-end starts here
    public function showSpeakers()
    {
        $speakers = Image::orderBy('firstname')->paginate(12);
        return view('speakers')->with('speakers', $speakers);
    }

    public function showSpeakerEpisodes($id)
    {
        $speaker = Image::get()->where('id', $id)->first();
        $episodes = Audio::take(12)->where('speaker', $id)->paginate(12);

        return view('speakerEpisodes')->with([
            'episodes'=> $episodes,
            'speaker' => $speaker
            ]);
    }

}
