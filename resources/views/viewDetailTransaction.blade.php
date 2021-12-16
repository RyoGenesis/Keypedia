@extends('sharedLayout.layout')
@section('title-header','Keypedia - Transaction Detail')

@section('content')
<div class=" card col-7 m-auto card-box-item" >
    <?php $total = 0;?>
        <div class="card-header ">
            Transaction {{$details[0]->transaction->transaction_date}}
        </div>
        <div class="card-body">
            @if ($details != null)
                @foreach ($details as $detail)
                    <div style="display:flex; margin-top:10px">
                        <div><img src="{{asset('storage/'.$detail->keyboard->image_path)}}" alt="test" width="300px"></div>
                        
                        <div>
                            <div style="margin:10px">
                                <h3>{{$detail->keyboard->name}}</h3>   
                            </div>
                            <div style="margin:10px">
                                <p>Subtotal : ${{$detail->keyboard->price*$detail->quantity}}</p> 
                                <?php $total+=$detail->keyboard->price*$detail->quantity?>
                            </div>
                            <div>
                                Quantitiy: {{$detail->quantity}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{redirect->back()}}
            @endif
            <h1>Total Price: {{$total}}</h1>
        </div>
    </div>
    
@endsection