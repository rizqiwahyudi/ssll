<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Mechine,
    PresenceLog,
    Presence,
    User,
    PresenceConfig
    };
use DB;
use Carbon\Carbon;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = PresenceConfig::first();
        $presences = Presence::orderBy('date','DESC')->orderBy('id','DESC')->get();
        return view('attendance.presence.index', compact(
            'presences','config'
        ));
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
    public function store(Request $request)
    {
        $raw = PresenceLog::select(DB::raw("pin,MIN(date_time) AS check_in,MAX(date_time) AS check_out,
        IF(MIN(date_time) = MAX(date_time), 'FALSE', 'TRUE') AS valid,
        (time_to_sec(timediff(MAX(date_time), MIN(date_time))) / 3600) as work_hours"))
        ->groupBy(DB::raw("pin, DATE_FORMAT(date_time, '%Y-%m-%d')"))
        ->orderBy(DB::raw("DATE_FORMAT(date_time, '%Y-%m-%d'), pin"))
        ->get();

        $config = PresenceConfig::first();
        $tollerance_in = Carbon::parse($config->time_in)->addMinute($config->tolerance_time_in);

        foreach($raw as $row){
            $getUser = User::where('id_on_machine', '=', $row->pin)->first();
            /* $check = Presence::where('date', date('Y-m-d',strtotime($row->check_in)))
                        ->where('time_in', date('H:i:s',strtotime($row->check_in)))
                        ->where('time_out', date('H:i:s',strtotime($row->check_out)))
                        ->count();
            if($check == 0){ */
                $check = $row->check_in == $row->check_out;
                    if(isset($getUser->id)){
                        $user_id               = $getUser->id;
                        $check_in              = date('H:i:s',strtotime($row->check_in));
                        $check_out             = date('H:i:s',strtotime($row->check_out));
                        $description           = 'ontime';
                        if($check == true && ($check_in > '12:00:00' || $check_out > '12:00:00')){
                            $check_in = '00:00:00';
                        }elseif($check == true && ($check_in < '12:00:00' || $check_out < '12:00:00')) {
                            $check_out = '00:00:00';
                        }
                        if(Carbon::parse(date('H:i:s',strtotime($row->check_in))) > Carbon::parse($tollerance_in)){
                            $description = 'late';
                        }
                        Presence::updateOrCreate(
                            [
                            'date' => Carbon::parse(date('Y-m-d',strtotime($row->check_in))),
                            'user_id'   => $user_id
                            ],
                            [
                            'time_in' => Carbon::parse($check_in),
                            'time_out' => Carbon::parse($check_out),
                            'description' => $description,
                            'work_hours' => $row->work_hours
                            ]
                        );
                        /* $presence              = new Presence();
                        $presence->date        = Carbon::parse(date('Y-m-d',strtotime($row->check_in)));
                        $presence->time_in     = Carbon::parse(date('H:i:s',strtotime($row->check_in)));

                        if($row->check_in != $row->check_out){
                            $presence->time_out= Carbon::parse(date('H:i:s',strtotime($row->check_out)));
                        }else{
                            $presence->time_out    = Carbon::parse(date('H:i:s',strtotime($row->check_out)));
                        }

                        if(Carbon::parse(date('H:i:s',strtotime($row->check_in))) > Carbon::parse($tollerance_in)){
                            $presence->description = 'late';
                        }else{
                            $presence->description = 'ontime';
                        }
                        $presence->user_id     = $user_id;
                        $presence->work_hours  = $row->work_hours;
                        $presence->save(); */
                    }

            }
        /* } */

        toast()->success('Presence successfully refreshed!');
        return redirect()->route('presences.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
