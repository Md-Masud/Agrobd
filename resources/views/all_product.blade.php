
@extends('layouts.frontend.app')

@section('title','All Product ')


@push('css')

@endpush

@section('contain')
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
        <div class="page-btn">
            <span>{!! $products->links() !!}</span>
        </div>
    </div>



@endsection

@push('js')

    <script>
        var menuitem = document.getElementById("menuitem");
        menuitem.style.maxHeight = "0px";
        function menutoggle(){
            if( menuitem.style.maxHeight == "0px"){
                menuitem.style.maxHeight = "200px";
            }
            else{
                menuitem.style.maxHeight = "0px";
            }
        }
    </script>
@endpush
