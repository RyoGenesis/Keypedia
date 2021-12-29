@extends('sharedLayout.layout')
@section('title-header','Keypedia - Add Keyboard')

@section('content')
    <div class=" card col-7 m-auto card-box-item">
        <div class="card-header">
            <p class="m-0">Add Keyboard</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="/addKeyboard" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="col-5"><label for="category">Category</label></td>
                                <td>
                                    <select class="form-select form-select-sm @error('category') is-invalid @enderror" name="category" id="category">
                                        <option value="" selected>Choose a category</option>
                                        @forelse ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label for="name">Keyboard Name</label></td>
                                <td>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="price">Keyboard Price ($)</label></td>
                                <td>
                                    <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" min="0" id="price">
                                    @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="description">Description</label></td>
                                <td>
                                    <textarea  class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="50" rows="3" style="resize: none"></textarea>  
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="image">Keyboard Image</label></td>
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