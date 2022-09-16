@extends('layouts.main')

@section('title', 'Edit')

@section('content')

<div class="container-lg">
    @include('comics.partials.edit-create-form', ['route' => 'comics.update', 'method' => 'PUT', 'comic', $comic])
</div>
@endsection