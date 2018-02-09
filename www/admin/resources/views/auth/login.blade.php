@extends('layouts.login')

@section('content')

    <div class="middle-box text-center">
        <div>
            <h2 class="m-b-lg">Care4D Admin</h2>

            {{-- Showing error bags, when log in fails --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissable text-left">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{$errors->all()[0]}}
            </div>
            @endif

            <form class="m-t" role="form" action="{{url('/login')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required=""
                           name="username"
                           value="{{old('username')}}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required=""
                           name="password"
                           value="{{old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
        </div>
    </div>

@endsection