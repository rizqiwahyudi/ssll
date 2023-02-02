<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\pertanyaan;
use App\Models\User;
use App\Models\Departement;
use App\Models\sekolah;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
            $kategori     = kategori::onlyTrashed()->count();
            $pertanyaan        = pertanyaan::onlyTrashed()->count();
            $users        = User::onlyTrashed()->count();
            $departements = Departement::onlyTrashed()->count();
            $sekolah   = sekolah::onlyTrashed()->count();
            return view('trash.index', compact(
                'kategori','pertanyaan','users','departements','sekolah'
            ));
    }

    public function listTrash($id)
    {
        if($id == 'users'){
            $users        = User::onlyTrashed()->get();
            return view('trash.usersTrash', compact(
                'users'
            ));
        } elseif ($id == 'kategori'){
            $kategori     = kategori::onlyTrashed()->get();
            return view('trash.kategoriTrash', compact(
                'kategori'
            ));
        } elseif ($id == 'pertanyaan'){
            $pertanyaan   = pertanyaan::onlyTrashed()->get();
            return view('trash.pertanyaanTrash', compact(
                'pertanyaan'
            ));
        } elseif ($id == 'sekolah'){
            $sekolah    = sekolah::onlyTrashed()->get();
            return view('trash.sekolahTrash', compact(
                'sekolah'
            ));
        } elseif ($id == 'departements'){
            $departements = Departement::onlyTrashed()->get();
            return view('trash.departementsTrash', compact(
                'departements'
            ));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreKategori($id = null)
    {
        $kategori = kategori::onlyTrashed();
        if($kategori->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $kategori->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $kategori->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restored'
            ));
        }
    }
    public function deleteKategori($id = null)
    {
        $kategori = kategori::onlyTrashed();
        if($kategori->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $kategori = $kategori->where('id', $id)->first();
            $kategori->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $kategori->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }

    public function restoreDepartements($id = null)
    {
        $departements = Departement::onlyTrashed();
        if($departements->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $departements->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $departements->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restored'
            ));
        }
    }
    public function deleteDepartements($id = null)
    {
        $departements = Departement::onlyTrashed();
        if($departements->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $departement = $departements->where('id', $id)->first();
            $departement->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $departements->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
                ));
            }
        }

    public function restoreUsers($id = null)
    {
        $user = User::onlyTrashed();
        if($user->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $user->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $user->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restored'
            ));
        }
    }
    public function deleteUsers($id = null)
    {
        $Users = User::onlyTrashed();
        if($Users->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $user = $Users->where('id', $id)->first();
            $user->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $Users->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }
    public function restorePertanyaan($id = null)
    {
        $pertanyaan = pertanyaan::onlyTrashed();
        if($pertanyaan->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $pertanyaan->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $pertanyaan->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restore!'
            ));
        }
    }
    public function deletePertanyaan($id = null)
    {
        $pertanyaan = pertanyaan::onlyTrashed();
        if($pertanyaan->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $pertanyaan = $pertanyaan->where('id', $id)->first();
            $pertanyaan->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $pertanyaan->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }

    public function restoreSekolah($id = null)
    {
        $sekolah = sekolah::onlyTrashed();
        if($sekolah->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $sekolah->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $sekolah->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restore!'
            ));
        }
    }
    public function deleteSekolah($id = null)
    {
        $sekolah = sekolah::onlyTrashed();
        if($sekolah->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $sekolah = $sekolah->where('id', $id)->first();
            $sekolah->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $sekolah->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }
}
