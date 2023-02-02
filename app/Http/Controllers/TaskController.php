<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Task, User, TaskStatus
};
use App\Http\Requests\TaskCreateRequest;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:task-list|task-create|task-edit|task-delete', ['only' => ['index','store']]);
        $this->middleware('permission:task-create', ['only' => ['create','store']]);
        $this->middleware('permission:task-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:task-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if(auth()->user()->hasRole('admin')){

            $tasks = Task::orderBy('id','DESC')->get();
            return view('task.index', compact(
                'tasks'
            ));

        }else if (auth()->user()->hasRole('supervisor')){

            $tasks = Task::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get();
            return view('task.index', compact(
                'tasks'
            ));

        }else if (auth()->user()->hasRole('user')){

            $tasks = Task::where('user_id', auth()->user()->id)->orderBy('id','DESC')->get();
            return view('task.index', compact(
                'tasks'
            ));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role(['supervisor','user'])->where('id','!=',auth()->user()->id)->get();
        $statuses = TaskStatus::all();
        return view('task.create', compact(
            'users', 'statuses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCreateRequest $request)
    {
        $data = $request->all();
        $data['start_date'] = date("Y-m-d", strtotime($request->start_date));
        $data['deadline'] = date("Y-m-d", strtotime($request->deadline));

        Task::create($data);
        toast()->success('Data have been succesfully saved!');
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $statuses = TaskStatus::all();
        return view('task.edit', compact(
            'task', 'statuses'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $task = Task::find($id);
        if(auth()->user()->hasAnyRole('admin|supervisor')){
            $this->validate($request, [
                'task_name' => ['required', 'string', 'max:100'],
                'deadline' => ['required'],
                'task_status_id' => ['required'],
            ]);

            if($data['task_status_id'] == '3'){
                $task->update($data);
            }else{
                File::delete('file/task/' . $task->file);
                $task->update([
                    'task_name'     => $data['task_name'],
                    'description'   => $data['description'],
                    'deadline'      => $data['deadline'],
                    'task_status_id'=> $data['task_status_id'],
                    'file'  => NULL,
                    'submitted_at'  => NULL
                ]);
            }

            toast()->success('Data have been succesfully updated!');
            return redirect()->route('tasks.index');
        }else if (auth()->user()->hasRole('user')){
            $this->validate($request, [
                'file' => ['required','file','mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip'],
                'description' => ['required', 'string', 'max:100'],
            ]);

            if ($request->file('file')) {
                File::delete('file/task/' . $task->file);
                $file = $request->file('file');
                $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
                $current_date = \Carbon\Carbon::now()->toDateTimeString();
                $task->update([
                    'file'          => $file_name,
                    'description'   => $request->description,
                    'submitted_at'  => $current_date,
                    'task_status_id'=> '2',
                ]);
                $file->move('file/task', $file_name);
                toast()->success('Your work have been succesfully uploaded!');
                return redirect()->route('tasks.index');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }

}
