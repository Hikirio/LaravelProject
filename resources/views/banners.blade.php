@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Header Image</h1>

        <form action="{{ url('/banners/upload') }}" method="post" enctype="multipart/form-data">

            <input type="text">{{ csrf_field()}}

            <div class="form-group">
                <input type="file" id="image" name="image">
            </div>

            <button class="btn btn-danger" type="submit" value="upload">Upload</button>
        </form>
        @isset($path)
            <img class="img-fluid" src="{{ asset('/storage/'.$path)}}" alt="">
        @endisset
    </div>
@endsection