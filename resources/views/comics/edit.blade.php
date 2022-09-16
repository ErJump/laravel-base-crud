@extends('layouts.main')

@section('title', 'Edit')

@section('content')

<div class="container-lg">
    <form action="{{ route('comics.update', $comic->slug) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="title">Title</label>
            <input required name="title" type="text" class="form-control" id="title" placeholder="Enter title" value="{{old('title', $comic->title)}}">
            @error('title')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description', $comic->description)}}"</textarea>
            @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="thumb">Image Url</label>
            <input required name="thumb" type="text" class="form-control" id="thumb"  placeholder="Enter thumb" value="{{old('thumb', $comic->thumb)}}">
            @error('thumb')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input required name="price" type="number" step="0.01" class="form-control" id="price"  placeholder="xx.xx" value="{{old('price', $comic->price)}}">
            @error('price')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="series">Series</label>
            <input required name="series" type="text" class="form-control" id="series"  placeholder="Enter series" value="{{old('series', $comic->series)}}">
            @error('series')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="sale_date">Sale Date</label>
            <input required name="sale_date" type="date" class="form-control" id="sale_date" value="{{old('sale_date', $comic->sale_date)}}">
            @error('sale_date')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="type">Type</label>
            <select class="form-select" name="type" id="type" required >
                <option value="comic book" {{'comic book' == old('type', $comic->type) ? 'selected' : ''}}>Comic Book</option>
                <option value="graphic novel" {{'graphic novel' == old('type', $comic->type) ? 'selected' : ''}}>Graphic Novel</option>
                <option value="other" {{'other' == old('type', $comic->type) ? 'selected' : ''}}>Other</option>
            </select>
            @error('type')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="w-100 text-center">
            <button type="submit" class="btn btn-primary">Edit Comic</button>
        </div>
    </form>
</div>
@endsection