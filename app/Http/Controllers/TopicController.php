<?php

namespace App\Http\Controllers;

use App\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{
    
    public function dashboard() 
    {
        //this function returns is for the dashboard for tpics section
       return view('admin.topicsDashboard');
    }

    public function viewTopics() 
    {
        $topics = Topics::orderBy('name')->get(); 
        return view('admin.topicsList')->with('topics', $topics);
    }

    public function topicEpisodes($id)
    {
        $topic = Topics::find($id);

        return view('topicEpisodes')->with('topic', $topic);
    }

    public function createTopicForm()
    {
        return view('admin.createTopicForm');
    }

    public function createTopic(Request $request)
    {
        $topic = Topics::create([
            'name' => $request->input('topicName')
        ]);

        Session::flash('message', 'Successfully created!');
        Session::flash('alert-class', 'text-success');
        
        return back();

    }

    public function editTopicForm($id)
    {
        $topic = Topics::find($id);

        return view('admin.editTopicForm')->with('topic', $topic);
    }

    public function editTopic($id, Request $request)
    {
        $topic = Topics::find($id);

        Session::flash('message', 'Successfully updated!');
        Session::flash('alert-class', 'text-success');
        
        $topic->name = $request->input('topicName');

        $topic->save();

        return back();

    }

    public function deleteTopic($id)
    {
        $topic = Topics::find($id);
        $topic->delete();

        Session::flash('message', 'successfully deleted');
        Session::flash('alert-danger', 'text-danger');

        return back();
    }

}
