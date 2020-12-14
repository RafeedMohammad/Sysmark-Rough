<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
      /*  $products = DB::table('products')
                        ->get();
        */

        $products = Product::orderBy('product_name', 'asc')->paginate(3);

        return view('pages.services')->with('products',$products);
        //return '<h1> My name is'.$name.' And my id:'.$id.'</h1>';
         
        
    }

    public function show($id)
    {   
       $product = DB::table('products')
                ->where('id',$id)
                ->first();

        return view('pages.show')->with('product', $product);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function saveproduct(Request $request)
    {
        /*$product = new Product();
        $product->product_name = $request->product_name; 
        $product->product_price = $request->product_price; 
        $product->product_category = $request->product_category;
        $product->product_description = $request->product_description; 
        */
        $this -> validate($request, ['product_name' => 'required',
                                      'product_price' => 'required',
                                      'product_category' => 'required',
                                      'product_description' => 'required']);

        $data = array();
        $data['product_name'] = $request->product_name;
        $product['product_price'] = $request->product_price;
        $product['product_category'] = $request->product_category;
        $product['product_description'] = $request->product_description;


       DB::table('products')
                ->insert($data);
        
        Session::put('success', 'The product has been added successfully');

        $product->save();   
        return redirect('/create');

        //print('this is the save page');
    }


    public function editproduct($id)
    {
        $product = Product::find($id);
        return view('pages.editproduct')->with('product', $product);

    }

    public function updateproduct(Request $request)
    {
        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_description = $request->input('product_description');

        $product -> update();

        Session::put('success', 'The '.$request->input('product_name').' has been updated successfully');

        return redirect('/services');
    }
}
