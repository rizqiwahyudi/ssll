<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:pertanyaan-list|pertanyaan-create|pertanyaan-edit|pertanyaan-delete', ['only' => ['index','store']]);
        $this->middleware('permission:pertanyaan-create', ['only' => ['create','store']]);
        $this->middleware('permission:pertanyaan-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pertanyaan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (auth()->user()->hasAnyRole('admin|supervisor')) {
            $kategori = kategori::all();
            $pertanyaans = pertanyaan::orderBy('id','DESC')->get();
            return view('pertanyaan.index', compact(
                'pertanyaans','kategori'
            ));
        } else if (auth()->user()->hasRole('user')) {
            $kategori = kategori::all();
            $pertanyaans = pertanyaan::orderBy('id','DESC')->get();
            return view('pertanyaan.index', compact(
                'pertanyaans','kategori'
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
        return view('pertanyaan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|min:8|unique:pertanyaans',
            'kategori' => 'required'
        ]);

        pertanyaan::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori
        ]);
        toast()->success('Data have been succesfully saved!');
        return redirect('pertanyaans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaans = pertanyaan::find($id);
        return view('pertanyaans.show',compact('pertanyaans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::all();
        $pertanyaan = pertanyaan::find($id);
        return view('pertanyaan.edit',compact('pertanyaan','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255|unique:pertanyaans',
            'kategori' => 'required'
        ]);

        $pertanyaan = pertanyaan::find($id);
        $input = $request->all();
        $pertanyaan->update($input);
        toast()->success('Pertanyaan updated successfully');
        return redirect()->route('pertanyaans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = pertanyaan::find($id);
        $pertanyaan->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
    }
}
