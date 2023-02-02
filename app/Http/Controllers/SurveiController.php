<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pertanyaan;
use App\Models\sekolah;
use App\Models\survei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $school = sekolah::all();
        $kategoris = kategori::with('pertanyaans')->orderBy('prioritas','asc')->get();
        $kategori_count = kategori::count();
        return view('survey.create', compact('users','school','kategoris', 'kategori_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        survei::create([
            'sekolah' => $request->sekolah,
            'by' => $request->by,
            'hasil' => $request->hasil,
            'history' => $request->answer
        ]);

        $sekolah = sekolah::where('id', $request->sekolah )->first();
        $sekolah->update([
            'hasil' => $request->hasil
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function show(survei $survei)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function edit(survei $survei)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, survei $survei)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function destroy(survei $survei)
    {
        //
    }
}
