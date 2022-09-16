@extends('layouts.main')

@section('title', 'Create')

@section('content')

<div class="container-lg">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('comics.store') }}" method="post">
        @csrf
        <div class="form-group mb-2">
            <label for="title">Title</label>
            <input required name="title" type="text" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group mb-2">
            <label for="thumb">Image Url</label>
            <input required name="thumb" type="text" class="form-control" id="thumb"  placeholder="Enter thumb">
        </div>
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input required name="price" type="number" step="0.01" class="form-control" id="price"  placeholder="xx.xx">
        </div>
        <div class="form-group mb-2">
            <label for="series">Series</label>
            <input required name="series" type="text" class="form-control" id="price"  placeholder="Enter series">
        </div>
        <div class="form-group mb-2">
            <label for="sale_date">Sale Date</label>
            <input required name="sale_date" type="date" class="form-control" id="price">
        </div>
        <div class="form-group mb-3">
            <label for="type">Type</label>
            <select class="form-select" name="type" id="type" required>
                <option value="comic book">Comic Book</option>
                <option value="graphic novel">Graphic Novel</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="w-100 text-center">
            <button type="submit" class="btn btn-primary">Add Comic</button>
        </div>
    </form>
</div>
@endsection