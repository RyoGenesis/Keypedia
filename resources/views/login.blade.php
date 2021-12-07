@extends('sharedLayout.layout')
@section('title-header','Keypedia')

@section('content')
    <div class=" card col-7 m-auto">
        <div class="card-header">
            <p class="m-0">Register</p>
        </div>
        <div class="card-body">
            <div class="w-75 m-auto">
                <form action="">
                    @csrf
                    <table>
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="col-5"><label for="username">Username</label></td>
                                <td><input class="form-control" type="text" name="username" id="username"></td>
                            </tr>
                            <tr>
                                <td class="col-5"><label for="email">E-mail Address</label></td>
                                <td><input class="form-control" type="text" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="password">Password</label></td>
                                <td><input class="form-control" type="password" name="password" id="password"></td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="confirm">Confirm Password</label></td>
                                <td><input class="form-control" type="password" name="confirm" id="confirm"></td>
                            </tr>
                            <tr>
                                <td class="col-5"><label  for="address">Address</label></td>
                                <td><textarea  class="form-control" name="address" id="address" cols="50" rows="2"></textarea>  </td>
                            </tr>
                            <tr>
                                <td><label class="col-4" for="gender">Gender</label></td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" id="male" value="Male">
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" id="female" value="Female">
                                        <label for="female">Female</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-5"><label for="dob">Date Of Birth</label></td>
                                <td><input class="form-control" type="date" name="dob" id="dob"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-primary" type="submit">Register</button></td>
                            </tr>
                        </tbody>
                    </table>                  
                </form>
            </div>
        </div>
    </div>
        
@endsection