@extends('sharedLayout.layout')
@section('title-header','Keypedia - Change Password')

@section('content')
    <div class=" card col-7 m-auto card-box-item">
        <div class="card-header">
            <p class="m-0">Change Password</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="/changePassword" method="POST">
                    @csrf
                    <table class="table table-borderless">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-5"><label for="password">Current Password</label></td>
                                <td>
                                    <input class="form-control" type="password" name="password" id="password" @error('password') is-invalid @enderror>
                                    @error('password')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="newPassword">New Password</label></td>
                                <td>
                                    <input class="form-control" type="password" name="newPassword" id="newPassword" @error('newPassword') is-invalid @enderror>
                                    @error('newPassword')
                                        <p>{{$message}}</p>
                                    @enderror
                                    
                                </td>
                            </tr>                
                            <tr>
                                <td class="col-5"><label  for="confirm">Confirm New Password</label></td>
                                <td>
                                    <input class="form-control" type="password" name="confirm" id="confirm" @error('confirm') is-invalid @enderror>
                                    @error('confirm')
                                        <p>{{$message}}</p>
                                    @enderror
                                    @if ($errors != null)
                                        @foreach ($errors->all() as $error)                                   
                                            @if($error == "Old Password is wrong!")<p>{{$error}}</p>@endif
                                            @if($error == "Change Password Success!")<p class="text-success">{{$error}}</p>@endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                
                                <td></td>
                                <td><button class="btn btn-bg-purple btn-outline-light" type="submit">Update Password</button></td>
                            </tr>
                        </tbody>
                    </table>                  
                </form>
            </div>
        </div>
    </div>
        
@endsection