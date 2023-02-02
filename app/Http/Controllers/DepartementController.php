<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();
        return view('departement.index',compact(
            'departements'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name','description']);
        $checkName = Departement::where('name',$data['name'])->count();
        if ($checkName == 1) {
            alert()->warning('Warning', 'Departement already exist!');
            return redirect('departements');
        } else {
        Departement::create($data);
        toast()->success('Success', 'Data have been succesfully saved!');
        return redirect('departements');
        }
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
        $departement = Departement::find($id);
        return view('departement.edit',compact(
            'departement'
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
        $departement = Departement::find($id);
        $departement->update($data);
        toast()->success('Success', 'Data have been succesfully saved!');
        return redirect('departements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departement = Departement::find($id);
        $checkUser  = User::withTrashed()->select('departement_id')->where('departement_id', $id)->count();
        if($checkUser == 0){
            $departement->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
        } else {
            return response()
                ->json(array(
                    'error' => true,
                    'title'   => 'Denied',
                    'message' => 'You cant delete this departement, becasue this departement still has employees'
                ));
        }

    }
    public function trash()
    {
        $data = Departement::onlyTrashed()
            ->paginate(5);
        return view('trash', compact(
            'data'
        ));
    }

    public function restore($id = null)
    {
        $model = Departement::onlyTrashed();
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
        $model = Departement::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->forceDelete();
            return redirect()->route('trash');
        } else {
            $model->forceDelete();
            return redirect()->route('trash');
        }
    }
}
