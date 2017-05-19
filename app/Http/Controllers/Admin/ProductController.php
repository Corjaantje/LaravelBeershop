<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\Http\Controllers\FileController;
class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('admin/products', compact('products'));
    }

   public function delete(Request $request){

       if ($request->has('delete')) {
           $ids = $request->input('delete');
           foreach($ids as $id) {
               product::where("id", "=", $id)->delete();
           }
       }
       return ProductController::index();
   }

   public function showProduct($id=null){
      $product = product::find($id);
       $categories = categorie::all();
       return view('admin/product', compact(['product','categories']));
   }

   public function createOrUpdate(Request $request, $filename){
        FileController::Upload();
       $product = product::updateOrCreate(
           ['id' => $request->input('id')],
           ['name' => $request->input('name'),
               'price' => $request->input('price'),
               'alcohol_contents' => $request->input('alcohol'),
               'contents_ml' => $request->input('contents'),
               'parent_category' => $request->input('category'),
               'description' => $request->input('description'),
               'image_url' => $filename]                               //todo image uploading
       );
       return ProductController::index();
   }
}

