<?php

namespace App\Http\Controllers;

use Form;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\Mechine;
use Illuminate\Http\Request;

class MechineController extends Controller
{
    public function index()
    {
        return view('mechine.index');
    }

    public function getDtRowData(Request $request)
    {
        $mechines = Mechine::select(['mechine_id', 'name', 'ip', 'port', 'is_default', 'created_at', 'updated_at']);

        return Datatables::of($mechines)
            ->addColumn('action', function ($mechine) {
                $btnEdit = '<a href="' . route('mechine.edit', $mechine->mechine_id) . '" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $btnDelete = Form::open(['method' => 'DELETE','route' => ['mechine.destroy', $mechine->mechine_id], 'style'=>'display:inline', 'id' => 'formDestroy' .  $mechine->mechine_id])
                            . '<button type="button" class="btn btn-danger btn-sm destroyData" data-id="' . $mechine->mechine_id . '">'
                            . '<i class="fa fa-trash"></i> Delete'
                            . '</button>'
                            . Form::close();
                return $btnEdit . ' ' . $btnDelete;
            })
            ->editColumn('mechine_id', '{{$mechine_id}}')
            ->editColumn('is_default', '{{$is_default == 1 ? "Default" : "-"}}')
            ->editColumn('created_at', '{{ Carbon\Carbon::parse($created_at)->diffForHumans() }}')
            ->editColumn('updated_at', '{{ Carbon\Carbon::parse($updated_at)->diffForHumans() }}')
            ->setRowId('mechine_id')
            ->make(true);
    }

    public function create()
    {
        return view('mechine.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'ip' => 'required',
            'is_default' => 'required'
        ]);
        Mechine::create($request->all());
        return redirect()->route('mechine.index')->with('success', 'Mechine created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mechine = Mechine::find($id);
        return view('mechine.edit', compact('mechine'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'ip' => 'required',
            'is_default' => 'required'
        ]);
        Mechine::find($id)->update($request->all());
        return redirect()->route('mechine.index')->with('success', 'Mechine updated successfully');
    }

    public function destroy($id)
    {
        Mechine::find($id)->delete();
        return redirect()->route('mechine.index')->with('success', 'Mechine deleted successfully');
    }
}
