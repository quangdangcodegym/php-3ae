<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.layout')
@section('title', 'Product create use include Page')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h1 class="text-center">Login</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('login')}}" method="post">
            @csrf
            <div class=" mb-3">
                <label class="d-block" for="">Email</label>
                <input name='email' value="{{old('email')}}" class="form-control" type="text" placeholder="Enter email..." />
            </div>
            <div class="mb-3">
                <label class="d-block" for="">Password</label>
                <input name='password' class="form-control" type="password" placeholder="Enter description..." />
            </div>
            <div class="mb-3">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
            <div class="row">
                <button class="btn btn-primary col-2 mx-2">Login</button>
                <button class="btn btn-dark col-2">Cancel</button>
            </div>
        </form>

    </div>
</div>
@endsection