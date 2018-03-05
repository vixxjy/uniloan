<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    public function index(){
         $products = Product::orderby('id', 'desc')->get();
        return view('products.index', ['products' => $products]);
    }
    
    public function create(){
       
        return view('products.create');
    }
    
    public function store(Request $request){
          $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'image' => 'required'
        ]);
        $input = $request->all();
    
        Product::create($input);
        
        Session::flash('success', 'Product was registered successfully!!!');
        
        return redirect()->back();
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }
    
    public function edit($id){
         $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }
    
    public function update(Request $request, $id){
           $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'image' => 'required'
        ]);
        $postData = $request->all();
        
        Product::findOrFail($id)->update($postData);
        
        Session::flash('success', 'Product was updated successfully!');

        return redirect()->route('products.index');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete();
        
        Session::flash('success', 'Product was deleted successfully!');

        return redirect()->route('products.index');
    }
}
