@extends('sharedLayout.layout')
@section('title-header','Keypedia - Transaction History')

@section('content')
    <div class="col-7 m-auto">
        <div class="header text-center">
            <h1>Your Transaction History</h1>
        </div>
        <div class="body">
            @forelse ($transaction as $trans)
                <div class="w-50 m-auto bg-light text-center rounded-3">
                    <a href="{{ url('viewTransaction/detail/'.$trans->id)}}">Transaction at {{$trans->transaction_date}}</a>
                </div>
                <div class="m-3"> </div>
            @empty
                <p class="text-center position-relative" style="top: 2rem;">No Transaction Yet.</p>
            @endforelse
        </div>
    </div>
@endsection