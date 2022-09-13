@extends('layouts.main')

@section('title', 'Index')

@section('content')
    <h1>Comics</h1>
    <ul>
        @foreach ($comics as $comic)
            <li>
                <a href="{{route('comics.show', $comic->id)}}">{{$comic->title}}</a>
            </li>
        @endforeach
    </ul>
@endsection