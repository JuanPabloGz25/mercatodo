<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-user|create-user|edit-user|borrar-user')->only('index');
         $this->middleware('permission:crear-user', ['only' => ['create','store']]);
         $this->middleware('permission:editar-user', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-user', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {      
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        return redirect()->route('users.index');
    }

    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit', compact('user','roles','userRole'));
    }
    
    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}