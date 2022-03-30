<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rol\StoreRolRequest;
use App\Http\Requests\Rol\UpdateRolRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function redirect;
use function view;

class RolController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-roles|crear-roles|editar-roles|borrar-roles', ['only' => ['index']]);
         $this->middleware('permission:crear-roles', ['only' => ['create','store']]);
         $this->middleware('permission:editar-roles', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-roles', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {
         $roles = Role::paginate(5);
         return view('roles.index',compact('roles'));
    }


    public function create(): View
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    public function store(StoreRolRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }


    public function show($id): void
    {

    }

    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(UpdateRolRequest $request, $id): RedirectResponse
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
