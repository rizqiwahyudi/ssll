<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,
    PaidLeave,
    Presence
};
use App\Http\Requests\{
    PaidLeaveCreateRequest,
    PaidLeaveReviewRequest,
};
use DB;
use \Carbon\Carbon;
use DateTime;
use DateInterval;
use DatePeriod;
class PaidLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:paidleave-list|paidleave-create|paidleave-edit|paidleave-delete', ['only' => ['index','store']]);
        $this->middleware('permission:paidleave-create', ['only' => ['create','store']]);
        $this->middleware('permission:paidleave-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:paidleave-delete', ['only' => ['destroy']]);
        $this->middleware('role:admin|supervisor',['only' => ['indexHistory']]);
    }


    public function index()
    {
        if(auth()->user()->hasRole('admin')){

            $paidLeaves = PaidLeave::whereNull('authorized_by')->orderBy('id', 'DESC')->get();
            return view('attendance.paidleave.index', compact(
                'paidLeaves'
            ));

        }else if(auth()->user()->hasRole('supervisor')){
            $paidLeaves = PaidLeave::Join('users','paid_leaves.user_id','=','users.id')
            ->Join('departements','users.departement_id','=','departements.id')
            ->where('users.departement_id', auth()->user()->departement_id)
            ->select('paid_leaves.*','users.fullname')
            ->orderBy('id', 'DESC')->whereNull('authorized_by')->get();
            return view('attendance.paidleave.index', compact(
                'paidLeaves'
            ));
        }else if (auth()->user()->hasRole('user')){

            $paidLeaves = PaidLeave::where('user_id', auth()->user()->id)->orderBy('id','DESC')->get();
            return view('attendance.paidleave.index', compact(
                'paidLeaves'
            ));
        }
    }

    public function indexHistory()
    {
        if(auth()->user()->hasRole('admin')){
            $historyPaidLeaves = PaidLeave::whereNotNull('authorized_by')->orderBy('id', 'DESC')->get();
            return view('attendance.paidleave.indexHistory', compact(
                'historyPaidLeaves'
            ));
        }else{
            $historyPaidLeaves = PaidLeave::Join('users','paid_leaves.user_id','=','users.id')
            ->Join('departements','users.departement_id','=','departements.id')
            ->where('users.departement_id', auth()->user()->departement_id)
            ->select('paid_leaves.*','users.fullname')
            ->orderBy('id', 'DESC')->whereNotNull('authorized_by')->get();
            return view('attendance.paidleave.indexHistory', compact(
                'historyPaidLeaves'
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaidLeaveCreateRequest $request)
    {
        $data = $request->all();
        $data['start_date'] = date("Y-m-d", strtotime($request->start_date));
        $data['end_date'] = date("Y-m-d", strtotime($request->end_date));

        PaidLeave::create([
            'user_id'       => auth()->user()->id,
            'description'   => $data['description'],
            'start_date'    => $data['start_date'],
            'end_date'      => $data['end_date'],
            'status'        => 'unprocessed',
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('paidleave.index');
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
        $paidLeave = PaidLeave::find($id);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $paidLeave->end_date);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $paidLeave->start_date);
        $interval = $to->diffInDays($from) + 1;

        return view('attendance.paidleave.review', compact(
            'paidLeave', 'interval'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaidLeaveReviewRequest $request, $id)
    {
        $paidLeave = PaidLeave::find($id);

        $begin = new DateTime($paidLeave->start_date);
        $end = new DateTime($paidLeave->end_date);
        $end = $end->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);

        if ($request->status == 'authorized') {
            DB::beginTransaction();
            try {

                $paidLeave->update([
                    'status'        => $request->status,
                    'authorized_by' => auth()->user()->id,
                ]);

                foreach($daterange as $date){
                    Presence::create(
                        [
                        'date' => Carbon::parse($date),
                        'user_id'   => $paidLeave->user_id,
                        'time_in' => '00:00:00',
                        'time_out' => '00:00:00',
                        'description' => 'paidleave',
                        'work_hours' => '0.00000'
                        ]
                    );
                }

            DB::commit();
            toast()->success('Submission have been succesfully processed!');
            return redirect()->route('paidleave.index');

            } catch (\Exception $exception) {
                DB::rollback();
                toast()->error('Submission failed to process!');
                return redirect()->route('paidleave.index');
            }
        } else if ($request->status == 'rejected'){
            $paidLeave->update([
                'status'        => $request->status,
                'authorized_by' => auth()->user()->id,
            ]);

            toast()->success('Submission have been succesfully processed!');
            return redirect()->route('paidleave.index');
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
        $paidLeave = PaidLeave::find($id);
        $paidLeave->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }
}
