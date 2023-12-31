<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question = new Question([
            'question' => $request->get('question'),
            'answers' => $request->get("answers"),
        ]);
        $question->save();

        return response()->json([
            'message' => 'Question saved!',
            'question' => $question
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::find($id);
        return response()->json($question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::find($id);

        if ($request->has('question')) {
            $question->question = $request->get('question');
        }

        if ($request->has('answers')) {
            $question->answers = $request->get('answers');
        }

        $question->save();

        return response()->json([
            'message' => 'Question updated!',
            'question' => $question
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);
        $question->delete();

        return response()->json([
            'message' => 'Question deleted!'
        ]);
    }
}
