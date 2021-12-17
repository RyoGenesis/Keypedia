@extends('sharedLayout.layout')
@section('title-header','Keypedia - Update Keyboard')

@section('content')
    <div class=" card col-lg-7 col-sm-12 m-auto card-box-item">
        <div class="card-header">
            <p class="m-0">Update Keyboard</p>
        </div>
        <div class="card-body">
            <div class=" m-auto row">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                    <img class="img-fluid" src="{{asset('storage/'.$keyboard->image_path)}}" alt="">
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 table-responsive">
                    <form action="/updateKeyboard" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div><input type="hidden" name="id" value="{{$keyboard->id}}" ></div>
                        <table class="table table-borderless text-end">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="category">Category</label></td>
                                    <td>
                                        <select class="form-select form-select-sm" name="category" id="category" @error('category') is-invalid @enderror>
                                            <option value="">Choose a category</option>
                                            @forelse ($categories as $category)
                                                @if ($category->id == $keyboard->category_id)
                                                    <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('category')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="name">Keyboard Name</label></td>
                                    <td>
                                        <input class="form-control" type="text" name="name" id="name" value="{{$keyboard->name}}"  @error('name') is-invalid @enderror>
                                        @error('name')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  for="price">Keyboard Price (US$)</label></td>
                                    <td>
                                        <input class="form-control" type="number" name="price" min="0" id="price" value="{{$keyboard->price}}" @error('price') is-invalid @enderror>
                                        @error('price')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  for="description">Description</label></td>
                                    <td>
                                        <textarea  class="form-control" name="description" id="description" cols="50" rows="3" style="resize: none" @error('description') is-invalid @enderror>{{$keyboard->description}}</textarea>  
                                        @error('description')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  for="image">Keyboard Image</label></td>
                                    <td class="text-start">
                                        <input type="file" name="image" id="image" @error('image') is-invalid @enderror>
                                        @error('image')
                                            <p>{{$message}}</p>
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