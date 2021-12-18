@extends('sharedLayout.layout')
@section('title-header','Keypedia - Manage Categories')

@section('content')
    <div class="row px-5">
        <div class="col-12 text-center my-3">
            <h1>Manage Categories</h1>
        </div>

        <div class="col-12 d-flex justify-content-center px-5 flex-wrap">
            @foreach ($categories as $category)
            <div class="col-3 card-box-item m-4 p-2 border rounded-3 text-center">
                <div style="background-color: white; height: 300px; display:flex; flex-wrap: wrap; align-items: center; justify-content: center;">
                        
                    <div style="width:fit-content;"><img  class="img-fluid" src="{{asset('storage/'.$category->image_path)}}" alt=""></div>
                </div>

                <p class="mt-1 mb-4 fw-bold">{{$category->category_name}}</p>
                <div >
                    <button class="btn btn-outline-light btn-bg-purple conf-delete" data-id={{$category->id}} data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" type="button">
                        Delete Category
                    </button>
                    <a href="{{ url('categories/'.$category->id.'/edit')}}" class="btn btn-outline-light btn-bg-purple">
                        Update Category
                    </a>
                </div> 
            </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <p>Are you sure to delete this category?</p>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="/deleteCategory" method="POST">
                @csrf
                <input type="hidden" id="id-categ" name="id">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <script>
        $(document).on('click','.conf-delete',function(){
            let id = $(this).attr('data-id');
            $('#id-categ').val(id);
        });
    </script>
@endsection
