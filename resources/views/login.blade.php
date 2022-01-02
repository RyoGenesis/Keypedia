@extends('sharedLayout.layout')
@section('title-header','Keypedia - Login')

@section('content')
<div class=" card col-7 m-auto card-box-item">
    <div class="card-header">
        <p class="m-0">Login</p>
    </div>
    <div class="card-body">
        <div class="w-75 m-auto">
            <form action="/doLogin" method="POST">
                @csrf
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="col-5"><label for="email">E-mail Address</label></td>
                            <td>
                                <input class="form-control @error('email_address') is-invalid @enderror" type="text" name="email_address" id="email" value={{Cookie::get('email')!= null? Cookie::get("email"):""}}>
                                @error('email_address')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="col-5"><label for="password">Password</label></td>
                            <td>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value={{Cookie::get('password')!= null? Cookie::get("password"):""}}>
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                @if ($errors != null)
                                @foreach ($errors->all() as $error)
                                @if($error == "Invalid Account!")<p class="text-danger">{{$error}}</p>@endif
                                @endforeach
                                @endif
                                
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox" name="remember" id="remember">Remember Me</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-bg-purple btn-outline-light" type="submit">Login</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection