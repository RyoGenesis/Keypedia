@extends('sharedLayout.layout')
@section('title-header','Keypedia - Register')

@section('content')

<div class=" card col-7 m-auto card-box-item">
    <div class="card-header">
        <p class="m-0">Register</p>
    </div>
    <div class="card-body">
        <div class="w-75 m-auto">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="col-5"><label for="username">Username</label></td>
                            <td>
                                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username">
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="col-5"><label for="email">E-mail Address</label></td>
                            <td>
                                <input class="form-control @error('email_address') is-invalid @enderror" type="text" name="email_address" id="email">
                                @error('email_address')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="col-5"><label for="password">Password</label></td>
                            <td>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="col-5"><label for="confirm">Confirm Password</label></td>
                            <td>
                                <input class="form-control @error('confirm') is-invalid @enderror" type="password" name="confirm" id="confirm">
                                @error('confirm')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="col-5"><label for="address">Address</label></td>
                            <td>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="50" rows="2"></textarea>
                                @error('address')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label class="col-4" for="gender">Gender</label></td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="@error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="Male">
                                    <label for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="@error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="Female">
                                    <label for="female">Female</label>
                                </div>
                                @error('gender')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="col-5"><label for="dob">Date Of Birth</label></td>
                            <td>
                                <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" id="dob">
                                @error('dob')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-outline-light btn-bg-purple" type="submit">Register</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="registerSuccessModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Confirmation</h5>
            </div>
            <div class="modal-body">
                Register is Successfull!, Redirecting you to Login Page!
            </div>
            <div class="modal-footer">
                <form action="{{ route('login.index') }}" method="get">
                    <button type="submit" class="btn btn-success modal-close" data-dismiss="modal">Confirm</button>
                </form>

            </div>
        </div>
    </div>
</div>

{{Session::has('success')}}
@if (Session::has('success'))
<script>
    $(document).ready(function() {
        $('#registerSuccessModal').modal('show');

        $('.modal-close').click(function() {
            $('#registerSuccessModal').modal('hide');
        });

    });
</script>
@endif
@endsection