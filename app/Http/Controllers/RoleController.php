<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
    }

    public function index(){
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index', compact('roles'));
    }

    public function create(){
        $permissions=$this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissions'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $role->permissionRole()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Mess: '.$e->getMessage().' -- Line: '.$e->getLine());
            return back();
        }
    }

    public function edit($id){
        $role=$this->role->find($id);
        $permissions=$this->permission->where('parent_id', 0)->get();
        $permissionRole=$role->permissionRole;
        return view('admin.role.edit', compact('role', 'permissions', 'permissionRole'));
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $this->role->find($id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $role = $this->role->find($id);
            $role->permissionRole()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Mess: '.$e->getMessage().' -- Line: '.$e->getLine());
            return back();
        }
    }

    public function destroy($id){
        $this->role->find($id)->delete();
        return redirect()->route('roles.index');
    }
}
