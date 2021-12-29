@extends('sharedLayout.layout')
@section('title-header','Keypedia - Update Keyboard')

@section('content')
    <div class=" card col-lg-7 col-sm-12 m-auto card-box-item">
        <div class="card-header">
            <p class="m-0">Update Category</p>
        </div>
        <div class="card-body">
            <div class=" m-auto row">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                    <img class="img-fluid" src="{{asset('storage/'.$category->image_path)}}" alt="">
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 table-responsive">
                    <form action="/updateCategory" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div><input type="hidden" name="id" value="{{$category->id}}" ></div>
                        <table class="table table-borderless text-start">
                            <tbody>
                                <tr>
                                    <td><label for="name">Category Name</label></td>
                                    <td>
                                        <input class="form-control @error('category_name') is-invalid @enderror" type="text" name="category_name" id="category_name" value="{{$category->category_name}}">
                                        @error('category_name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  for="image">Category Image</label></td>
                                    <td class="text-start">
                                        <input class="@error('image') is-invalid @enderror" type="file" name="image" id="image">
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-start">
                                        <button class="btn btn-outline-light btn-bg-purple" type="submit">Update</button>
                                        @if (session('success'))
                                            <p>{{session('success')}}</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>                  
                    </form>
                </div>
            </div>
        </div>
    </div>
        
@endsection