@extends('layouts.app')

@section('title')
    Product Details 
@endsection


@section('content')

            

            <h2>Product Details</h2>
       
                <div class="well">
                    <h3> {{$product->product_name}}</h3>
                    <h3>Price: {{$product->product_price}} BDT</h3>
                    <h3>Category: {{$product->product_category}}</h3>
                    <h3>Product Description:</h3>
                    <p>{{$product->product_description}}</p>
                    <hr>
                    <h4>Created at: {{$product->created_at}}</h4>
                    <hr>
                    <a href="/edit/{{$product->id}}" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </div>

            <br>
            <br>
            
        
        
@endsection('content')    

