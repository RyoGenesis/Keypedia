@extends('sharedLayout.layout')
@section('title-header','Keypedia')

@section('content')
    <div class="row px-5">
        <div class="col-12 text-center">
            <h1>Welcome To Keypedia</h1>
            <p class="fw-bold fs-6">Best Keyboard and Keycaps Shop</p>
        </div>
        <div class="col-12 text-center mt-3">
            <p class="fs-4">Categories</p>
        </div>
        <div class="col-12 d-flex justify-content-center px-5 flex-wrap">
            @foreach ($categories as $category)
            <div class="col-3 card-box-item m-4 p-1 rounded-3">
                <div class="border border-secondary rounded-3 h-100 text-center d-flex flex-column">
                    <p class="mt-3 text-primary fw-bold">{{$category->category_name}}</p>
                    <div class="bg-white rounded-bottom flex-grow-1 d-flex align-items-center">
                        <img class="img-fluid rounded-bottom" src="{{asset('storage/'.$category->image_path)}}" alt="">
                    </div>
                </div>  
            </div>
            @endforeach               
        </div>
    </div>
@endsection