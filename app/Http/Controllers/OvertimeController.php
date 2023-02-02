<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Overtime,
    User};
use App\Http\Requests\{
    OvertimeCreateRequest,
    OvertimeReviewRequest
};

class OvertimeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:overtime-list|overtime-create|overtime-edit|overtime-delete', ['only' => ['index','store']]);
        $this->middleware('permission:overtime-create', ['only' => ['create','store']]);
        $this->middleware('permission:overtime-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:overtime-delete', ['only' => ['destroy']]);
        $this->middleware('role:admin|supervisor',['only' => ['indexHistory']]);
    }

    public function index()
    {
        if(auth()->user()->hasRole('admin')){

            $overtimes = Overtime::whereNull('authorized_by')->orderBy('id', 'DESC')->get();
            return view('attendance.overtime.index', compact(
                'overtimes'
            ));

        }else if(auth()->user()->hasRole('supervisor')){
            $overtimes = Overtime::Join('users','overtimes.user_id','=','users.id')
            ->Join('departements','users.departement_id','=','departements.id')
            ->where('users.departement_id', auth()->user()->departement_id)
            ->select('overtimes.*','users.fullname')
            ->orderBy('id', 'DESC')->whereNull('authorized_by')->get();
            return view('attendance.overtime.index', compact(
                'overtimes'
            ));

        }else if (auth()->user()->hasRole('user')){

            $overtimes = Overtime::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
            return view('attendance.overtime.index', compact(
                'overtimes'
            ));
        }
    }

    public function indexHistory()
    {
        if(auth()->user()->hasRole('admin')){
            $historyOvertimes = Overtime::whereNotNull('authorized_by')->orderBy('id', 'DESC')->get();
            return view('attendance.overtime.indexHistory', compact(
                'historyOvertimes'
            ));
        }else{
            $historyOvertimes = Overtime::Join('users','overtimes.user_id','=','users.id')
            ->Join('departements','users.departement_id','=','departements.id')
            ->where('users.departement_id', auth()->user()->departement_id)
            ->select('overtimes.*','users.fullname')
            ->orderBy('id', 'DESC')->whereNotNull('authorized_by')->get();
            return view('attendance.overtime.indexHistory', compact(
                'historyOvertimes'
            ));
        }
    }

    public function create()
    {
        $overtime = Overtime::all();
        $users = User::all();
        return view('attendance.overtime.create', compact('overtime','users'));
    }

    public function store(OvertimeCreateRequest $request)
    {
        $data = $request->all();
        $data['date'] = date("Y-m-d", strtotime($request->date));

        Overtime::create([
            'user_id'       => auth()->user()->id,
            'description'   => $data['description'],
            'date'          => $data['date'],
            'status'        => 'unprocessed',
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('overtime.index');
    }

    public function edit($id)
    {
        $overtime = Overtime::find($id);
        return view('attendance.overtime.review', compact(
            'overtime'
        ));
    }

    public function update(Request $request, $id)
    {
        $overtime = Overtime::find($id);
        $overtime->update([
            'status'        => $request->status,
            'authorized_by' => auth()->user()->id,
        ]);

        toast()->success('Submission have been succesfully processed!');
        return redirect()->route('overtime.index');
    }

    public function destroy($id)
    {
        $overtime = Overtime::find($id);
        $overtime->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }

}
