@extends('layouts.main')

@section('title', 'Edit')

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
    <form action="{{ route('comics.update', $comic->slug) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="title">Title</label>
            <input required name="title" type="text" class="form-control" id="title" placeholder="Enter title" value="{{$comic->title}}">
        </div>
        <div class="form-group mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$comic->description}}"</textarea>
        </div>
        <div class="form-group mb-2">
            <label for="thumb">Image Url</label>
            <input required name="thumb" type="text" class="form-control" id="thumb"  placeholder="Enter thumb" value="{{$comic->thumb}}">
        </div>
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input required name="price" type="number" step="0.01" class="form-control" id="price"  placeholder="xx.xx" value="{{$comic->price}}">
        </div>
        <div class="form-group mb-2">
            <label for="series">Series</label>
            <input required name="series" type="text" class="form-control" id="series"  placeholder="Enter series" value="{{$comic->series}}">
        </div>
        <div class="form-group mb-2">
            <label for="sale_date">Sale Date</label>
            <input required name="sale_date" type="date" class="form-control" id="sale_date" value="{{$comic->sale_date}}">
        </div>
        <div class="form-group mb-3">
            <label for="type">Type</label>
            <select class="form-select" name="type" id="type" required >
                <option value="comic book" {{($comic->type == 'comic book') ? 'selected' : ''}}>Comic Book</option>
                <option value="graphic novel" {{$comic->type == 'graphic novel' ? 'selected' : ''}}>Graphic Novel</option>
                <option value="other" {{($comic->type == 'other') ? 'selected' : ''}}>Other</option>
            </select>
        </div>
        <div class="w-100 text-center">
            <button type="submit" class="btn btn-primary">Edit Comic</button>
        </div>
    </form>
</div>
@endsection