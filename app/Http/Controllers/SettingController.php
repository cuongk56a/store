<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index(){
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create(){
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request){
        $dataInsert = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ];
        $this->setting->create($dataInsert);
        return redirect()->route('settings.index');
    }

    public function edit($id){
        $setting=$this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id){
        $dataUpload = [
            'config_value' => $request->config_value,
            'config_key' => $request->config_key
        ];
        $this->setting->find($id)->update($dataUpload);
        return redirect()->route('settings.index');
    }

    public function destroy($id){
        $this->setting->find($id)->delete();
        return redirect()->route('settings.index');
    }
}
