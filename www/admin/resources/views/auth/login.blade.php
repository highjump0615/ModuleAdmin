@extends('layouts.login')

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h2 class="m-b-md">Care4D Admin</h2>

            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                Username or password is not correct
            </div>

            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
        </div>
    </div>

@endsection