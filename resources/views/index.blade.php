
@extends('layouts.frontend.app')

@section('title','Home')


@push('css')

@endpush

@section('contain')
    <div class="small-container">
        <h2 class="title">Feature Product</h2>
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

        <!---------Letest Product--------->

        <h2 class="title">Letest Product</h2>
        <div class="row">
            @foreach($productsLatest as $product)
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
    </div>

@endsection

@push('js')

@endpush
