<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topics;
use App\Image;

class GeneralController extends Controller
{
    public function home()
    {
        $topics = Topics::inRandomOrder()->paginate(4);
        $speakers = Image::inRandomOrder( )->paginate(4);
        return view('home')->with([
            'topics' => $topics,
            'speakers' => $speakers
        ]);
    }

    public function about()
    {

    }

    public function contact()
    {

    }

    public function policy()
    {

    }

    public function donate()
    {

    }
}
