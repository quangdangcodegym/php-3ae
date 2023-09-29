<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.layout')
@section('title', 'Product create use include Page')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center">Create Music</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('musics.save')}}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="d-block" for="">Name</label>
                    <input name='name' value="{{old('name')}}" class="form-control" type="text" placeholder="Enter name..." />
                </div>
                <div class="col-sm-6">
                    <label class="d-block" for="">Description</label>
                    <input name='description' value="{{old('description')}}" class="form-control" type="text" placeholder="Enter description..." />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="d-block" for="">Author</label>
                    <select name='author_id' class="form-select">
                        @foreach ($authors as $author)
                        <option {{ old('author_id') == $author->id ? 'selected' : '' }} value="{{ $author->id}}">{{ $author->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <button class="btn btn-primary col-2 mx-2">Create</button>
                <button href="{{ route('musics.index')}}" class="btn btn-dark col-2">Cancel</button>
            </div>
        </form>

    </div>
</div>
@endsection