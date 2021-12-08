@extends('sharedLayout.layout')
@section('title-header','Keypedia - MyCart')

@section('content')
    
    <div class=" card col-7 m-auto card-box-item" >
        <div class="card-header ">
            My Cart
        </div>
        <div class="card-body">
            
            @foreach ( $carts as $cart)
            <div style="display:flex; margin-top:10px">
                
                <div><img src="{{asset('storage/'.$cart->keyboard->image_path)}}" alt="test" width="300px"></div>
                
                <div>
                    <div style="margin:10px">
                        <h3>{{$cart->keyboard->name}}</h3>   
                    </div>
                    <div style="margin:10px">
                        <p>Subtotal : ${{$cart->keyboard->price*$cart->quantity}}</p> 
                    </div>
                    <div style="margin:10px">
                        <form action="/updateCart" method="post">
                            @csrf
                            @error('quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div><input type="hidden" name="keyboard_id" value="{{$cart->keyboard_id}}" ></div>
                            <div class="m-4">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" value="{{$cart->quantity}}"@error('quantity') is-invalid @enderror>
                                
                            </div>
                            <div class="m-auto" style="width:fit-content;"><button class="btn btn-bg-purple text-white" type="submit">Update</button></div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
@endsection