@extends('sharedLayout.layout')
@section('title-header','Keypedia - My Cart')

@section('content')
    <div class="col-7 m-auto">
        <div class="header text-center">
            <h1>Your Transaction History</h1>
        </div>
        <div class="body">
            
            @foreach ($transaction as $trans)
                <div class="w-50 m-auto bg-light text-center rounded-3">
                    <a href="/viewTransaction/detail/{{$trans->id}}">{{$trans->transaction_date}}</a>
                </div>
                <div class="m-3"> </div>
                
            @endforeach
        </div>
    </div>
    
@endsection