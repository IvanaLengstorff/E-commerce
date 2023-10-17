<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('users')
                     ->join('model_has_roles', 'model_id', '=', 'users.id')
                     ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                     ->select('users.*', 'roles.name as roles_name')
                     ->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $users=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        if($request->roles > 0){
            $users->roles()->sync($request->roles);
            $users->save();
        }

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user', 'roles') );
    }

    public function update(Request $request, User $user)
    {
        if ($user->id==2 && $user->id !== auth()->user()->id){
            return redirect()->route('users.edit', $user)->with('error', 'No Puedes Editar los datos del Admin');
        }
        if($user->name <> $request->name){
            $user->name = $request->name;
        }
        if($request->password <> ''){
            $user->password = bcrypt($request->password);
        }

        if($user->email <> $request->email)
            $user->email = $request->email;

        if($request->roles > 0 ){
            $user->roles()->sync($request->roles);
        }           
        $user->save(); 
        return redirect()->route('users.edit', $user)->with('info', 'se actualizo el usuario correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
