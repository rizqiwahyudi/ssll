<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:kategori-list|kategori-create|kategori-edit|kategori-delete', ['only' => ['index','store']]);
        $this->middleware('permission:kategori-create', ['only' => ['create','store']]);
        $this->middleware('permission:kategori-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:kategori-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (auth()->user()->hasAnyRole('admin|supervisor')) {
            $kategoris = kategori::all();
            return view('kategori.index', compact(
                'kategoris'
            ));
        } else if (auth()->user()->hasRole('user')) {
            $kategoris = kategori::all();
            return view('kategori.index', compact(
                'kategoris'
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
        return view('kategori.index');
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
            'nama' => 'required|max:255',
            'prioritas' => 'required|unique:kategoris'
        ]);

        kategori::create([
            'nama' => $request->nama,
            'prioritas' => $request->prioritas
        ]);
        toast()->success('Data have been succesfully saved!');
        return redirect('kategoris');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris = kategori::find($id);
        return view('kategoris.show',compact('kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::find($id);
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'prioritas' => 'required|unique:kategoris'
        ]);

        $kategori = kategori::find($id);
        $input = $request->all();
        $kategori->update($input);
        toast()->success('Kategori updated successfully');
        return redirect()->route('kategoris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::find($id);
        $pertanyaan = pertanyaan::find($id);
        if($kategori->id == $pertanyaan->kategori)
        {
            return response()
                ->json(array(
                    'error' => true,
                    'title'   => 'Warning',
                    'message' => 'You cant delete this category, because this category is currently dependent'
                ));
        }
        else {
            $kategori->delete();
                return response()
                    ->json(array(
                        'success' => true,
                        'title'   => 'Success',
                        'message' => 'Your file has been moved to trash!'
                    ));
        }
    }
}
