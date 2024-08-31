<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }
    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function getCategory($parentId){
        $data = $this->category->get();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId='');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ];
        $this->category->create($data);
        return redirect()->route('categories.index');
    }

    public function show(){

    }
    
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id){
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ];
        $this->category->find($id)->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
