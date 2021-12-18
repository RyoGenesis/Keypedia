@extends('sharedLayout.layout')
@section('title-header','Keypedia - Manage Categories')

@section('content')
    <div class="row px-5">
        <div class="col-12 text-center my-3">
            <h1>Manage Categories</h1>
        </div>

        <div class="col-12 d-flex justify-content-center px-5 flex-wrap">
            @foreach ($categories as $category)
            <div class="col-3 card-box-item m-4 p-2 border rounded-3 text-center">
                <div style="background-color: white; height: 300px; display:flex; flex-wrap: wrap; align-items: center; justify-content: center;">
                        
                    <div style="width:fit-content;"><img  class="img-fluid" src="{{asset('storage/'.$category->image_path)}}" alt=""></div>
                </div>

                <p class="mt-1 mb-4 fw-bold">{{$category->category_name}}</p>
                <div >
                    <button class="btn btn-outline-light btn-bg-purple" type="button" onclick="">
                        Delete Category
                    </button>
                    <a href="{{ url('categories/'.$category->id.'/edit')}}" class="btn btn-outline-light btn-bg-purple">
                        Update Category
                    </a>
                </div> 
            </div>
            @endforeach
        </div>
    </div>
@endsection