<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        $roles=$this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $user=$this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            $user->userRole()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Message: '.$e->getMessage(). '-- Line: '.$e->getLine());
            return back();
        }
    }

    public function edit($id){
        $user=$this->user->find($id);
        $roles=$this->role->all();
        $rolesOfUser=$user->userRole;
        return view('admin.user.edit', compact('user', 'roles','rolesOfUser'));
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $user=$this->user->find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user->userRole()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Message: '.$e->getMessage(). '-- Line: '.$e->getLine());
            return back();
        }
    }

    public function destroy($id){
        $this->user->find($id)->delete();
        return redirect()->route('users.index');
    }
}
