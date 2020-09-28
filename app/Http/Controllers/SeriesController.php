<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Image;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class SeriesController extends Controller
{
    public function dashboard()
    {
        return view('admin.seriesDashboard');
    }

    public function viewSeries()
    {
        $series = Series::orderBy('title')->paginate(12);
        return view('admin.viewSeries')->with('series', $series);
    }

    public function createSeriesForm()
    {
        $speakers = Image::orderBy('firstname')->get();
        $episodes = Audio::orderBy('speaker')->paginate(8); 
        return view('admin.createSeriesForm')->with([
            'episodes' => $episodes,
            'speakers' => $speakers
            ]);
    }

    public function createSeries(Request $request)
    {
        
        $series = Series::create([
            'title' => $request->input('seriesName'),
            'speaker' => $request->input('seriesSpeaker'),
            'episodes' => json_encode($request->input('seriesEpisodesId'))
        ]);

        Session::flash('message', 'Successfully created!'); 
        Session::flash('alert-class', 'text-success'); 

        return back();

        // $episodes = json_encode($request->input('seriesEpisodesId'));

        // return $episodes;
    }

    public function editSeriesForm($id)
    {
        $speakers = Image::orderBy('firstname')->get();
        $serie = Series::get()->where('id', $id )->first();
        $AllEpisodes =  Audio::orderBy('speaker')->paginate(8);
        $array = json_decode($serie->episodes);

        $episodes = Audio::find($array);
        return view('admin.editSeries')->with([
            'episodes' => $episodes,
            'serie' => $serie,
            'AllEpisodes' => $AllEpisodes,
            'speakers' => $speakers,
            'array' => $array
        ]);
    }

    public function editSeries($id, Request $request)
    {

        $serie = Series::find($id);


        //if($request->input('seriesName')) {
            $serie->title = $request->input('seriesName');
        //}

        //if($request->has('seriesSpeaker')) {
            $serie->speaker = $request->input('seriesSpeaker');
        //}

        //if($request->filled('seriesEpisodesId')) {
            $serie->episodes = json_encode($request->input('seriesEpisodesId'));
       // }
        
        
        

        $serie->save();

        Session::flash('message', 'Successfully updated!');
        Session::flash('alert-class', 'text-success');

        return back();
    }

    public function deleteSeries($id)
    {
        $serie = Series::find($id);
        $serie->delete();

        Session::flash('message', 'successfully deleted');
        Session::flash('alert-danger', 'text-danger');

        return back();

    }

    //front-end
    public function viewAllSeries()
    {
        $series = Series::orderBy('title')->paginate(12);
        return view('series')->with('series', $series);
    }

    public function viewASeries($id)
    {
        $series = Series::get()->where('id', $id )->first();
        //return view('episodes')->with('episodes', $series);
        $array = json_decode($series->episodes);

        $episodes = Audio::find($array);
        return view('seriesEpisodes')->with([
            'episodes' => $episodes,
            'series' => $series
        ]);
    }
}
