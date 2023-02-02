<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use App\Models\SalaryType;
use App\Http\Requests\SalaryCreateRequest;
use App\Http\Requests\SalaryUpdateRequest;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:salary-list|salary-create|salary-edit|salary-delete', ['only' => ['index','store']]);
        $this->middleware('permission:salary-create', ['only' => ['create','store']]);
        $this->middleware('permission:salary-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:salary-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (auth()->user()->hasAnyRole('admin|supervisor')) {
            $salaries = Salary::all();
            return view('salary.index', compact(
                'salaries'
            ));
        } else if (auth()->user()->hasRole('user')) {
            $salaries = Salary::where('user_id', auth()->user()->id)->get();
            return view('salary.index', compact(
                'salaries'
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
        $users = User::all();
        $salarytypes = SalaryType::all();
        return view('salary.create', compact(
            'users','salarytypes'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryCreateRequest $request)
    {
        $data = $request->all();
        $data['date'] = date("Y-m-d", strtotime($request->date));
        Salary::create($data);
        toast()->success('Data have been succesfully saved!');
        return redirect('salaries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary      = Salary::find($id);
        $users       = User::all();
        $salarytypes = SalaryType::all();
        return view('salary.edit', compact(
            'salary','salarytypes','users'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryUpdateRequest $request, $id)
    {
        $data = $request->all();
        $salary = Salary::find($id);
        $salary->update($data);
        toast()->success('Success', 'Data have been succesfully saved!');
        return redirect('salaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary = Salary::find($id);
        $salary->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
    }
    public function trash()
    {
        $data = Salary::onlyTrashed()
            ->paginate(5);
        return view('trash', compact(
            'data'
        ));
    }

    public function restore($id = null)
    {
        $model = Salary::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->restore();
            return redirect()->route('trash');
        } else {
            $model->restore();
            return redirect()->route('trash');
        }
    }

    public function delete($id = null)
    {
        $model = Salary::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->forceDelete();
            return redirect()->route('trash');
        } else {
            $model->forceDelete();
            return redirect()->route('trash');
        }
    }
}
