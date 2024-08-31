<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use StorageImageTrait;
    
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    private $category;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;

    }

    public function index(){
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function getProduct(){
        $categorys = $this->category->where('parent_id', 0)->get();
        $products = $this->product->latest()->paginate(12);
        return view('auth.product.index', compact('categorys', 'products'));
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId='');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function store(ProductAddRequest $request){
        try{
            DB::beginTransaction();
            $dataProductCreate=[
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'views_count' => 0,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product=$this->product->create($dataProductCreate);
    
            //Insert to product_images
            if($request->hasFile('image_path')){
                foreach( $request->image_path  as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
    
            //Insert to tags
            $tagIds=[];
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Message: '. $e->getMessage() . 'Line: ' . $e->getLine());
        }
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('product', 'htmlOption'));
    }

    public function show($id){
        $product = $this->product->find($id);
        $categorys = $this->category->where('parent_id', 0)->get();
        $productRecommed = $this->product->latest('views_count')->take(6)->get();
        $categoryLimit = $this->category->where('parent_id', 0)->take(3)->get();
        return view('auth.product.detail',compact('categorys','productRecommed','categoryLimit','product'));
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $dataProductUpdate=[
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product=$this->product->find($id);
    
            //Insert to product_images
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id', $id)->delete();
                foreach( $request->image_path  as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
    
            //Insert to tags
            $tagIds=[];
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Message: '. $e->getMessage() . '-- Line: ' . $e->getLine());
        }
    }

    public function destroy($id){
        try{
            $this->product->find($id)->delete();
            return response()->json([
                'code'=> 200,
                'message' => 'success'
            ], status:200);
        } catch(Exception $e){
            Log::error('Message: '. $e->getMessage() . '-- Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status: 500);
        }
    }

    public function listSearchProduct(Request $request){
        $searchProduct = $request->searchName;
        $list=$this->product->where('name',8,'%'.$searchProduct.'%')->get();
        $categorys = $this->category->where('parent_id', 0)->get();
        return view('auth.product.searchProduct', compact('list','categorys'));
    } 
}
