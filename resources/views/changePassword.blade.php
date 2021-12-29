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
                        <tbody>
                            <tr>
                                <td class="col-5"><label for="password">Current Password</label></td>
                                <td>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                                    @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="newPassword">New Password</label></td>
                                <td>
                                    <input class="form-control @error('newPassword') is-invalid @enderror" type="password" name="newPassword" id="newPassword">
                                    @error('newPassword')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>                
                            <tr>
                                <td class="col-5"><label  for="confirm">Confirm New Password</label></td>
                                <td>
                                    <input class="form-control @error('confirm') is-invalid @enderror" type="password" name="confirm" id="confirm">
                                    @error('confirm')
                                        <p class="text-danger">{{$message}}</p>
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