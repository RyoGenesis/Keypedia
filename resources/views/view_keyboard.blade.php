@extends('sharedLayout.layout')
@section('title-header',"Keypedia - $category->category_name")

@section('content')
    <div class="row px-lg-5 px-sm-1s text-center">
        <div class="col-12 text-center category-header rounded-3" style="background-color: rgb(157, 255, 245)">
            <h2>{{$category->category_name}}</h2>
        </div>
        {{--input field search here--}}

        {{--input field search here end--}}
        <div class="col-12 px-lg-5 row row-cols-lg-3 row-cols-sm-2 row-cols-md-2 mx-auto justify-content-center">
            @forelse ($keyboards as $keyboard)
                <div class="col px-lg-4">
                    <div class="m-lg-4 mt-4 card-box-item p-1 border rounded-3 text-center">
                        <div class="image-box-display">
                            <div><img  class="img-fluid text-center" src="{{asset('storage/'.$keyboard->image_path)}}" alt=""></div>
                        </div>
                        <div style="height: 100px;" class="mb-4">
                            <a class="text-decoration-none" href="{{ url('keyboards/'.$keyboard->id)}}">
                                <p class="mt-3 mb-0 text-primary fw-bolder truncated-text-3" >{{$keyboard->name}}</p>
                            </a>
                            <p class="text-white">US$ {{$keyboard->price}}</p>
                        </div>
                        @auth
                            @if(Auth::user()->role->role_name == "Manager")
                                <div>
                                    <button class="btn btn-outline-light btn-bg-purple" type="button" onclick="">
                                        Delete Keyboard
                                    </button>
                                    <a href="{{ url('update-keyboard/'.$keyboard->id)}}" class="btn btn-outline-light btn-bg-purple">
                                        Update Keyboard
                                    </a>
                                </div>
                            @endif
                        @endauth  
                    </div>
                </div>
            @empty
                <p>Belum ada keyboard untuk kategori ini...</p>
            @endforelse
        </div>
    </div>
@endsection