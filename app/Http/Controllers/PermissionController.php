<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index(){
        $permissions = $this->permission->latest()->paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    public function create(){
        return view('admin.permission.add');
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $permissionParent=$this->permission->create(([
                'name' => $request->module_parent,
                'display_name' => $request->module_parent,
                'parent_id'=> 0,
                'key_code' => ''
            ]));
            foreach($request->module_childrent as $value){
                $this->permission->create(([
                    'name' => $value,
                    'display_name' => $value,
                    'parent_id'=> $permissionParent->id,
                    'key_code' => $permissionParent->name . '_' . $value
                ]));
            }
            DB::commit();
            return redirect()->route('roles.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Message: '.$e->getMessage().' -- Line: '.$e->getLine());
            return back();
        }
    }
}
