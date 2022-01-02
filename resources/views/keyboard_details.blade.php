@extends('sharedLayout.layout')
@section('title-header',"Keypedia - $keyboard->name")

@section('content')
    
    <div class=" card col-7 m-auto card-box-item" >
        <div class="card-header ">
            Detail Keyboard
        </div>
        <div class="card-body">
            <div class="row" style="margin-top:10px">
                
                <div class="col-lg-4 mb-4">
                    <div class="bg-white flex-grow-1 d-flex align-items-center align-self-center">
                        <img class="img-fluid" src="{{asset('storage/'.$keyboard->image_path)}}" alt="test">
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <h4 class="mb-3">{{$keyboard->name}}</h4>  
                    <p>$ {{$keyboard->price}}</p> 
                    <p>{{$keyboard->description}}</p> 
                    @if(Auth::guest() || Auth::user()->role->role_name == "Customer")
                        <div class="text-center">
                            <form action="{{ route('add-to-cart') }}" method="post">
                                @csrf
                                
                                <div><input type="hidden" name="keyboard_id" value="{{$keyboard->id}}" ></div>
                                <div class="m-4">
                                    <label class="me-2" for="quantity">Quantity</label>
                                    <input class="@error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" value="1">                               
                                </div>
                                @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                <div class="m-auto" style="width:fit-content;"><button class="btn btn-bg-purple text-white" type="submit">Add to Cart</button></div>
                                @if (session('success'))
                                    <p class="text-success">{{session('success')}}</p>
                                @endif 
                            </form>       
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection