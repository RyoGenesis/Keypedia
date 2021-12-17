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
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="col-5"><label for="category">Category</label></td>
                                <td>
                                    <select class="form-select form-select-sm" name="category" id="category" @error('category') is-invalid @enderror>
                                        <option value="" selected>Choose a category</option>
                                        @forelse ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label for="name">Keyboard Name</label></td>
                                <td>
                                    <input class="form-control" type="text" name="name" id="name"  @error('name') is-invalid @enderror>
                                    @error('name')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="price">Keyboard Price ($)</label></td>
                                <td>
                                    <input class="form-control" type="number" name="price" min="0" id="price" @error('price') is-invalid @enderror>
                                    @error('price')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="description">Description</label></td>
                                <td>
                                    <textarea  class="form-control" name="description" id="description" cols="50" rows="3" style="resize: none" @error('description') is-invalid @enderror></textarea>  
                                    @error('description')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="image">Keyboard Image</label></td>
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