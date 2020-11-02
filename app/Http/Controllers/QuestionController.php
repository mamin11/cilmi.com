<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questions_options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //this fuction displays questions in the front end
        $questions = Question::inRandomOrder()->get()->take(10);

        return view('question', [
            'questions' => $questions
            ]);
    }

    public function dashboard()
    {
        return view('admin.questionsDashboard');
    }
    
    public function viewQuestions()
    {
        $questions = Question::orderBy('question')->paginate(10);
        return view('admin.viewQuestions')->with('questions', $questions);
    }

    public function createQuestionsForm()
    {
        return view('admin.createQuestionForm');
    }

    public function createQuestions(Request $request)
    {
        $customMessages = [
            'required' => 'Please enter :attribute '
        ];

        $rules = [
            'questionName' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option2' => 'required',
            'option4' => 'required',
        ];

        $validatedData = $request->validate($rules, $customMessages);


        $question = Question::create([
            'question' => $request->input('questionName')
        ]);

        for($o = 1; $o <= 4; $o++){

            $options = Questions_options::create([
                'question_id' => $question->id,
                'option_text' => $request->input('option'.$o),
                'state' => $request->input('rightAnswer'.$o)
            ]);

        }

        Session::flash('message', 'Successfully created!'); 
        Session::flash('alert-class', 'text-success'); 

        return back();
    }

    public function editQuestionsForm($id)
    {
        $question = Question::get()->where('id', $id )->first();

        return view('admin.editQuestionForm')->with('question', $question);
    }

    public function editQuestions($id, Request $request)
    {
        //find the question to be edited
        $question = Question::get()->where('id', $id )->first();

        //find the options
        $options = Questions_options::get()->where('question_id', $question->id);

        //update the question 
        $question->question = $request->input('questionName');

        $n = 1;
        //update the options
        foreach($options as $option){
            $option->option_text = $request->input('option'.$n);

            //check if the checkbox is checked
            $request->input('rightAnswer'.$n) ? $option->state = 1 : $option->state = 0;

            $n++;
            $option->save();
        }

        $question->save();

        Session::flash('message', 'Successfully updated!');
        Session::flash('alert-class', 'text-success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the question to be edited
        $question = Question::get()->where('id', $id )->first();

        //find the options
        $options = Questions_options::get()->where('question_id', $question->id);

        //delete the question
        $question->delete();

        //delete the options
        foreach($options as $option){
            $option->delete();
        }

        Session::flash('message', 'successfully deleted');
        Session::flash('alert-danger', 'text-danger');

        return back();
    }
    

    //front end
    public function showResults(Request $request)
    {

        $customMessages = [
            'required' => 'Fadlan ka jawaab suaal walba'
        ];

        $rules = [
            'questionOption' => 'required'
        ];

        $validatedData = $request->validate($rules, $customMessages);

            //these options are the ones the user selected as answers
        $options = Questions_options::find(array_values($request->input('questionOption')));

        $result = $options->sum('state');

        return view('results-component')->with([
            'result' => $result,
            'options' => $options,
        ]);
    }
}
