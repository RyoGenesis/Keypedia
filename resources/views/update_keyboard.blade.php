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
                    <form action="{{ route('keyboard.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div><input type="hidden" name="id" value="{{$keyboard->id}}" ></div>
                        <table class="table table-borderless text-start">
                            <tbody>
                                <tr>
                                    <td><label for="category">Category</label></td>
                                    <td>
                                        <select class="form-select form-select-sm @error('category') is-invalid @enderror" name="category" id="category">
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
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="name">Keyboard Name</label></td>
                                    <td>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{$keyboard->name}}">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  for="price">Keyboard Price (US$)</label></td>
                                    <td>
                                        <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" min="0" id="price" value="{{$keyboard->price}}">
                                        @error('price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  for="description">Description</label></td>
                                    <td>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="50" rows="3" style="resize: none">{{$keyboard->description}}</textarea>  
                                        @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="image">Keyboard Image</label></td>
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
    </div>
        
@endsection