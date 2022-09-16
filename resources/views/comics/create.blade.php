@extends('layouts.main')

@section('title', 'Create')

@section('content')

<div class="container-lg">
    @include('comics.partials.edit-create-form', ['route' => 'comics.store', 'method' => 'POST', 'comic' => $comic])
</div>
@endsection