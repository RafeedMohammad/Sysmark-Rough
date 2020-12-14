@extends('layouts.app')

@section('title')
    Services
@endsection


@section('content') 

        @foreach ($products as $product)
            

            <h1>Welcome to the services page</h1>
            @if (Session::has('success'))
                <div class = "alert alert-success">
                    {{Session::get('success')}}
                    
    <           </div>
            @endif
                <div class="well">
                    <h1>{{$product->product_name}}</h1>
                    <h3>Price: {{$product->product_price}} BDT</h3>
                    <h3>Category: {{$product->product_category}}</h3>

                    <a href="/show/{{$product->id}}">View Details!</a>
                {{--<p>{{$product->product_description}}</p>
                <hr>
                <h4>{{$product->created_at}}</h4>--}}
                </div>

            <br>
            <br>
            
        @endforeach
        {{$products->links()}}
@endsection('content')    

