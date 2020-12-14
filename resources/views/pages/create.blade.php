
@extends('layouts.app')

@section('title')
    about
@endsection


@section('content')

@if (Session::has('success'))
    <div class = "alert alert-success">
        {{Session::get('success')}}
        {{Session::out('success',null)}}
    </div>
@endif

{{--<form action="{{url('/saveproduct')}}" method="POST" class="form-horizontal">--}}


    

    {!!Form::open(['action' => 'PagesController@saveproduct', 'method' => 'POST', 'class' => 'form-horizontal'])!!}

    {{csrf_field()}}
    <div class="form-group">
        {{--<label>Product</label>--}}
        {{Form::label('', 'Product Name')}}

        {{Form::text('product_name', '', ['placeholder' => 'Product Name', 'class' => 
        'form-control'])}}
        {{--<input type="text" name="product_name" placeholder="Product Name" class="form-control" required>--}}
    </div>
    <div class="form-group">
        {{--<label>Product Price</label>--}}
        {{Form::label('', 'Product Price')}}
        {{Form::number('product_price', '', ['placeholder' => 'Product Price', 'class' => 
        'form-control'])}}

        {{--<input type="text" name="product_price" placeholder="Product Price" class="form-control" required>--}}
        
    </div>

    <div class="form-group">
        {{--<label>Product Category</label>--}}
        {{Form::label('', 'Product Category')}}
        {{Form::text('product_category', '', ['placeholder' => 'Product Category', 'class' => 
        'form-control'])}}

        {{--<input type="text" name="product_category" placeholder="Product Category" class="form-control" required>--}}
        
    </div>

    <div class="form-group">
        {{--<label>Product description</label>--}}
        {{Form::label('', 'Product Description')}}
        {{Form::textarea('product_description', '', ['placeholder' => 'Product Description', 'class' => 
        'form-control'])}}

        {{--<textarea name="product_description" cols="30" rows="10" class="form-control" required></textarea>--}}
        
    </div>
    {{--<input type="submit" value="Add Product" class="btn btn-primary">--}}
    {{Form::submit('Add Product', ['class' => 'btn btn-primary'])}}

    {!!Form::close()!!}
  </form>
   
        
@endsection





