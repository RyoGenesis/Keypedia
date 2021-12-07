@extends('sharedLayout.layout')
@section('title-header','Keypedia')

@section('content')
    <div class=" card col-7 m-auto">
        <div class="card-header">
            <p class="m-0">Login</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="">
                    @csrf
                    <table class="table table-borderless">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-5"><label for="email">E-mail Address</label></td>
                                <td><input class="form-control" type="text" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="password">Password</label></td>
                                <td><input class="form-control" type="password" name="password" id="password"></td>
                            </tr>                
                            
                            <tr>
                                <td></td>
                                <td><button class="btn btn-primary" type="submit">Login</button></td>
                            </tr>
                        </tbody>
                    </table>                  
                </form>
            </div>
        </div>
    </div>
        
@endsection