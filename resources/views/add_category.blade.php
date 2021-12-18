@extends('sharedLayout.layout')
@section('title-header','Keypedia - Add Keyboard')

@section('content')
    <div class=" card col-7 m-auto card-box-item">
        <div class="card-header">
            <p class="m-0">Add Category</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="/addCategory" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-borderless">
                        <thead>

                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="col-5"><label for="category_name">Category Name</label></td>
                                <td>
                                    <input class="form-control" type="text" name="category_name" id="category_name"  @error('category_name') is-invalid @enderror>
                                    @error('category_name')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="col-5"><label  for="image">Category Image</label></td>
                                <td>
                                    <input type="file" name="image" id="image" @error('image') is-invalid @enderror>
                                    @error('image')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-outline-light btn-bg-purple" type="submit">Add</button>
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
        
@endsection