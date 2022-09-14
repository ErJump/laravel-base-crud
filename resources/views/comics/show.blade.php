@extends('layouts.main')

@section('title', $comic->title)

@section('content')
<div class="container-lg">
        <h2 class="mb-3">{{$comic->title}}</h2>
        <div class="row">
            <div class="col-4">
                <img  class="img-fluid" src="{{$comic->thumb}}" alt="{{$comic->title}}">
            </div>
            <div class="col-8">
                <p>{{$comic->description}}</p>
                <p><strong>Price:</strong> {{$comic->price}}</p>
                <p><strong>Series:</strong> {{$comic->series}}</p>
                <p><strong>Sale Date:</strong> {{$comic->sale_date}}</p>
                <p><strong>Type:</strong> {{$comic->type}}</p>
            </div>
        </div>
    </div>
@endsection