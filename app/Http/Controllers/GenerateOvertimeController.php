<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overtime;
use Spatie\Permission\Models\Role;
use PDF;

class GenerateOvertimeController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin|supervisor',['only' => ['export']]);
    }

    public function export($id)
    {
        $overtime = Overtime::find($id);
        $roles    = Role::all();
        $pdf = PDF::loadView('attendance.overtime.export', compact('overtime','roles'))->setPaper('a4','portrait');
        return $pdf->stream('Surat Izin Lembur - '.$overtime->user->fullname . '.pdf');
    }
}
