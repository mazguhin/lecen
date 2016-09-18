<?php

namespace App\Http\Controllers\General;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\General\Subject;
use Illuminate\Http\Request;
use Session;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subjects = Subject::paginate(25);

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('subjects.create', ['courses'=>\App\Models\General\Course::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'min:1|max:100|required',
			'hours' => 'min:0|required',
			'cost' => 'min:0|required',
			'course_id' => 'required'
		]);
        
        $subject = new Subject;
        $subject->name=$request->name;
        $subject->hours=$request->hours;
        $subject->cost=$request->cost;
        $subject->course_id=$request->course_id;
        $subject->save();

        Session::flash('flash_message', 'Дисциплина добавлена!');

        return redirect('subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);

        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        return view('subjects.edit', [
            'subject'=>$subject,
            'courses'=>\App\Models\General\Course::all(),
            'course_id_now'=>$subject->course->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'name' => 'min:1|max:100|required',
			'hours' => 'min:0|required',
			'cost' => 'min:0|required',
			'course_id' => 'required'
		]);
        $requestData = $request->all();
        
        $subject = Subject::findOrFail($id);
        $subject->update($requestData);

        Session::flash('flash_message', 'Дисциплина обновлена!');

        return redirect('subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Subject::destroy($id);

        Session::flash('flash_message', 'Дисциплина удалена!');

        return redirect('subjects');
    }
}
