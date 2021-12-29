@extends('sharedLayout.layout')
@section('title-header','Keypedia - Transaction Detail')

@section('content')
<div class="text-center">
    <h1>Transaction {{$details[0]->transaction->transaction_date}}</h1>
</div>
<?php $total3 = 0;
$total1 = 0; ?>
<div class=" text-center">
    <h3>===============================================================</h3>
    <div class="d-flex justify-content-around">
        <div class="col">
            <p>Keyboard Image</p>
        </div>
        <div class="col">
            <p>Keboard Name</p>
        </div>
        <div class="col">
            <p>SubTotal</p>
        </div>
        <div class="col">
            <p>Quantity</p>
        </div>
    </div>
    <h3>===============================================================</h3>
    @if($details != null)
    @foreach ($details as $detail)
    <div class="row mb-4">
        <div class="col"><img src="{{asset('storage/'.$detail->keyboard->image_path)}}" alt="test" width="130px"></div>
        <div class="col">
            <p>{{$detail->keyboard->name}}</p>
        </div>
        <div class="col">
            <p>${{$detail->keyboard->price*$detail->quantity}}</p>
            <?php $total3 += $detail->keyboard->price * $detail->quantity ?>
        </div>
        <div class="col">
            <p> {{$detail->quantity}}</p>
        </div>
    </div>
    @endforeach
    @else

    @endif
    <h3>===============================================================</h3>
    <div class="row">
        <div class="col" style="width: 150px;">

        </div>
        <div class="col">
            <h3>Total Price: ${{$total3}}</h3>
        </div>
    </div>
</div>
<div>

</div>



@endsection