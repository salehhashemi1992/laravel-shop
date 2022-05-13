@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$product->title}}</h4>
                            <p class="card-text">{{$product->description}}</p>
                            <a href="{{route('product_details', $product->id)}}">جزئیات محصول</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
