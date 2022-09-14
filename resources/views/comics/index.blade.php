@extends('layouts.main')

@section('title', 'Index')

@section('content')
    <div class="container-lg">
        <h3 class="mb-4">Comics:</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" colspan="2">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Series</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Type</th>
                    <th scope="col"><strong>Edit</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td><a href="{{route('comics.show', $comic->slug)}}">{{$comic->id}}</a></th>
                        <td colspan="2">{{$comic->title}}</td>
                        <td>{{$comic->price}}</td>
                        <td>{{$comic->series}}</td>
                        <td>{{$comic->sale_date}}</td>
                        <td>{{$comic->type}}</td>
                        <td>
                            <a href="{{route('comics.edit', $comic->id)}}">
                                <button type="button" class="btn btn-secondary">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul>
        </ul>
    </div>
@endsection