@extends('sharedLayout.layout')
@section('title-header',"Keypedia - $category->category_name")

@section('content')
    <div class="row px-5">
        <div class="col-12 text-center category-header rounded-3" style="background-color: rgb(157, 255, 245)">
            <h2>{{$category->category_name}}</h2>
        </div>
        {{--input field search here--}}

        {{--input field search here end--}}
        <div class="col-12 d-flex justify-content-center px-5 flex-wrap">
            @forelse ($keyboards as $keyboard)
                <div class="col-3 card-box-item m-4 p-1 border rounded-3 text-center">
                    <div>
                        
                        <img class="img-fluid" src="{{asset('storage/'.$keyboard->image_path)}}" alt="">
                    </div>
                    <a class="text-decoration-none" href="{{ url('keyboards/'.$keyboard->id)}}">
                        <p class="mt-3 mb-0 text-primary fw-bolder">{{$keyboard->name}}</p>
                    </a>
                    <p class="mb-4 text-white">US$ {{$keyboard->price}}</p>
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
            @empty
                <p>Belum ada keyboard untuk kategori ini...</p>
            @endforelse
        </div>
    </div>
@endsection