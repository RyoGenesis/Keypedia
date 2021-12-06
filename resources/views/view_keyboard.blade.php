@extends('sharedLayout.layout')
@section('title-header','Keypedia - Categ Name')

@section('content')
    <div class="row px-5">
        <div class="col-12 text-center category-header rounded-3" style="background-color: rgb(157, 255, 245)">
            <h2>Category Name</h2>
        </div>
        {{--input field search here--}}

        {{--input field search here end--}}
        <div class="col-12 d-flex justify-content-center px-5 flex-wrap">
            <div class="col-3 card-box-item m-4 p-1 border rounded-3 text-center">
                <p class="mt-3 text-primary fw-bold">87 Key Keyboard</p>
                <div>
                    <img class="img-fluid" src="https://www.wasdkeyboards.com/pub/media/catalog/product/cache/cee7a71fd82c474592eb38179a21d892/8/7/87-blue.png" alt="">
                </div>
                <p>Test</p>
                <div>
                    <button class="btn btn-outline-light btn-bg-purple">
                        Delete Category
                    </button>
                    <a href="/" class="btn btn-outline-light btn-bg-purple">
                        Update Category
                    </a>
                </div> 
            </div>
        </div>
    </div>
@endsection