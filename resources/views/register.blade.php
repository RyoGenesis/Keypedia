@extends('sharedLayout.layout')
@section('title-header','Keypedia - Register')

@section('content')
    
    <div class=" card col-7 m-auto">
        <div class="card-header">
            <p class="m-0">Register</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="/addUser" method="POST">
                    @csrf
                    <table class="table table-borderless">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="col-5"><label for="username">Username</label></td>
                                <td>
                                    <input class="form-control" type="text" name="username" id="username" @error('username') is-invalid @enderror>
                                    @error('username')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label for="email">E-mail Address</label></td>
                                <td>
                                    <input class="form-control" type="text" name="email_address" id="email"  @error('email_address') is-invalid @enderror>
                                    @error('email_address')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="password">Password</label></td>
                                <td>
                                    <input class="form-control" type="password" name="password" id="password" @error('password') is-invalid @enderror>
                                    @error('password')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="confirm">Confirm Password</label></td>
                                <td>
                                    <input class="form-control" type="password" name="confirm" id="confirm" @error('confirm') is-invalid @enderror>
                                    @error('confirm')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="address">Address</label></td>
                                <td>
                                    <textarea  class="form-control" name="address" id="address" cols="50" rows="2" @error('address') is-invalid @enderror></textarea>  
                                    @error('address')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="col-4" for="gender">Gender</label></td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" id="male" value="Male" @error('gender') is-invalid @enderror>
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" id="female" value="Female" @error('gender') is-invalid @enderror>
                                        <label for="female">Female</label>
                                    </div>
                                    @error('gender')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label for="dob">Date Of Birth</label></td>
                                <td>
                                    <input class="form-control" type="date" name="dob" id="dob" @error('dob') is-invalid @enderror>
                                    @error('dob')
                                        <p>{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit">Register</button>
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