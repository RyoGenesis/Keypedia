@extends('sharedLayout.layout')
@section('title-header','Keypedia - Add Keyboard')

@section('content')
    <div class=" card col-7 m-auto card-box-item">
        <div class="card-header">
            <p class="m-0">Add Category</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="col-5"><label for="category_name">Category Name</label></td>
                                <td>
                                    <input class="form-control @error('category_name') is-invalid @enderror" type="text" name="category_name" id="category_name">
                                    @error('category_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="image">Category Image</label></td>
                                <td>
                                    <input class="@error('image') is-invalid @enderror" type="file" name="image" id="image">
                                    @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-outline-light btn-bg-purple" type="submit">Add</button>
                                    @if (session('success'))
                                        <p class="text-success">{{session('success')}}</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>                  
                </form>
            </div>
        </div>
    </div>
        
@endsection