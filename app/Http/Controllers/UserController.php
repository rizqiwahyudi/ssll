<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{
    User,
    Departement,
    Task,
    Salary
};
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $users = User::orderBy('id','DESC')->get();
            $roles = Role::all();
            $departements = Departement::all();
            return view('users.index',compact('users', 'roles', 'departements'));
        } else {
            $users = User::where('departement_id', auth()->user()->departement_id)->orderBy('id','DESC')->get();
            $roles = Role::all();
            $departements = Departement::all();
            return view('users.index',compact('users', 'roles', 'departements'));
        }


    }

    public function create()
    {
        $roles = Role::all();
        return view('users.index',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|max:100',
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'departement_id' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $id = User::role($input['roles'])->count()+1;
        if ($input['roles'] == 'admin') {
            $regNumber = str_replace("-", "", "01" . "." . date('m-Y', time())) . "." . sprintf("%'.04s", $id);
        } elseif ($input['roles'] == 'supervisor') {
            $regNumber = str_replace("-", "", "02" . "." . date('m-Y', time())) . "." . sprintf("%'.04s", $id);
        } else {
            $regNumber = str_replace("-", "", "03" . "." . date('m-Y', time())) . "." . sprintf("%'.04s", $id);
        }

        $current_date = \Carbon\Carbon::now()->toDateTimeString();
        $input['registration_number'] = $regNumber;
        $input['date_of_entry'] = $current_date;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        toast()->success('User created successfully');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $depart = Departement::all();
        $userRole = $user->roles->first();
        return view('users.edit',compact('user','roles','userRole','depart'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|max:255|min:5',
            'fullname' => 'required|max:255|min:8',
            'email' => 'required|email|unique:users,email,'.$id,
            'gender' => 'required',
            'last_education' => 'required',
            'phone' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,svg|max:2048',
            'departement_id' => 'required',
            'roles' => 'required'
        ]);


        $user = User::find($id);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        if ($request->file('photo')) {
            File::delete('img/profile/' . $user->photo);
            $file = $request->file('photo');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $destinationPath = public_path('img/profile');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['photo'] = $file_name;
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        toast()->success('User updated successfully');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if((auth()->user()->id) == $user->id){
            return response()
                    ->json(array(
                        'error' => true,
                        'title'   => 'Warning',
                        'message' => 'You cant delete a logged user!'
                    ));
        }

        $checkTask     = Task::withTrashed()->select('user_id')->where('user_id', $id)->count();
        $checkAssignor = Task::withTrashed()->select('created_by')->where('created_by', $id)->count();
        $checkSalary   = Salary::withTrashed()->select('user_id')->where('user_id', $id)->count();
        if($checkTask > 0 || $checkAssignor > 0 || $checkSalary > 0){
            return response()
                    ->json(array(
                        'error' => true,
                        'title'   => 'Warning',
                        'message' => 'You cant delete this user, because this user is currently dependent'
                    ));
        }else{
            User::find($id)->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
        }
    }

    public function reset(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                auth()->logout();
                return redirect()->route('login');
            } else {
                toast()->error('Old password invalid!');
                return redirect()->route('users.edit', $id);
            }
        } else {
            toast()->error('User not Found');
            return redirect()->route('users.index');
        }
    }
}
