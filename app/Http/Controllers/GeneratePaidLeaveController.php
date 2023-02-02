<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaidLeave;
use Spatie\Permission\Models\Role;
use PDF;

class GeneratePaidLeaveController extends Controller
{

    function __construct()
    {
        $this->middleware('role:admin|supervisor',['only' => ['export']]);
    }

    public function export($id)
    {
        $paidLeave = PaidLeave::find($id);
        $roles     = Role::all();

        $pdf = PDF::loadView('attendance.paidleave.export', compact('paidLeave','roles'))->setPaper('a4','portrait');
        return $pdf->stream('Surat Izin Cuti - ' . $paidLeave->user->fullname . '.pdf');
    }
}
