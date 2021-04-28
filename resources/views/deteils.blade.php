
@extends('layouts.frontend.app')

@section('title','Product Details')


@push('css')

@endpush

@section('contain')
    <div class="small-container single-product">
        <div class="row">
            <div class="col-4">
                <img src="{{asset('uploads/pictures/'.$product->picture)}}">
            </div>
            <div class="col-2">
                <p>Home / Vegetable</p>
                <h1>{{$product->name}}</h1>
                <h4>{{$product->price}} tk</h4>
                <input type="number" value="1">
                <a href="" class="btn">Add Cart</a>
                <div class="body">
                    {!! $product->body !!}
                </div>
            </div>
        </div>
    </div>
    <div class="small-container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-4">
                    <a href="{{ route('index.show',$product->id) }}">
                        <img src="{{asset('uploads/pictures/'.$product->picture)}}">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->price}} Taka</p>
                        <h3>Details</h3>
                    </a>
                    <h3>Add Cart</h3>
                </div>
            @endforeach

        </div>
@endsection

@push('js')

@endpush
