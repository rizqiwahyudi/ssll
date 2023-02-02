<?php

namespace App\Http\Controllers;

use Image;
use App\Models\sekolah;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:sekolah-list|sekolah-create|sekolah-edit|sekolah-delete', ['only' => ['index','store']]);
        $this->middleware('permission:sekolah-create', ['only' => ['create','store']]);
        $this->middleware('permission:sekolah-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sekolah-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (auth()->user()->hasAnyRole('admin|supervisor')) {
            $sekolahs = sekolah::all();
            return view('sekolah.index', compact(
                'sekolahs'
            ));
        } else if (auth()->user()->hasRole('sekolah')) {
            $sekolahs = sekolah::all();
            return view('sekolah.index', compact(
                'sekolahs'
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
        return view('sekolah.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,sekolah $sekolah )
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'alamat' => 'required'
        ]);

        $input = $request->all();
        if ($request->file('photo')) {
            File::delete('img/profile/' . $sekolah->photo);
            $file = $request->file('photo');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $destinationPath = public_path('img/profile');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['photo'] = $file_name;
        }
        $sekolah = sekolah::create($input);
        toast()->success('sekolah created successfully');
        return redirect()->route('sekolahs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sekolahs = sekolah::find($id);
        return view('sekolahs.show',compact('sekolahs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = sekolah::find($id);
        return view('sekolah.edit',compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'alamat' => 'required'
        ]);

        $sekolah = sekolah::find($id);
        $input = $request->all();
        if ($request->file('photo')) {
            File::delete('img/profile/' . $sekolah->photo);
            $file = $request->file('photo');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $destinationPath = public_path('img/profile');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['photo'] = $file_name;
        }
        $sekolah->update($input);
        toast()->success('sekolah updated successfully');
        return redirect()->route('sekolahs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sekolah = sekolah::find($id);
        $sekolah->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
    }
}
