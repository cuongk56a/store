<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    
    public function index(){
        $menus = $this->menu->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }

    public function getMenu($parentId){
        $data = $this->menu->get();
        $menuRecusive = new MenuRecusive($data);
        $htmlOption = $menuRecusive->menuRecusive($parentId);
        return $htmlOption;
    }
    public function create(){
        $optionSelect =  $this->getMenu($parentId='');
        return view('admin.menu.add', compact('optionSelect'));
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ];
        $this->menu->create($data);
        return redirect()->route('menus.index');
    }

    public function edit($id){
        $menu = $this->menu->find($id);
        $optionSelect = $this->getMenu($menu->parent_id);
        return view('admin.menu.edit', compact('menu','optionSelect'));
    }

    public function update(Request $request, $id){
        $data=[
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ];
        $this->menu->find($id)->update($data);
        return redirect()->route('menus.index');
    }

    public function destroy($id){
        $this->menu->find($id)->delete($id);
        return redirect()->route('menus.index');
    }
}
