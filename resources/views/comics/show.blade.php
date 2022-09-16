@extends('layouts.main')

@section('title', $comic->title)

@section('content')
<div class="container-lg">
        @if (session('result-message'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('result-message')}}</strong> 
            </div>
        @endif
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
            <div class="col-12 text-center">
                <form action="{{ route('comics.destroy', $comic->slug)}}" method="post" class="ms_form_delete" title-delete="{{$comic->title}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const deleteForms = document.querySelectorAll('.ms_form_delete');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const titleName = this.getAttribute('title-delete');
                e.preventDefault();
                const confirmDelete = window.confirm(`Are you sure you want to delete ${titleName}?`);
                if (confirmDelete) {
                    this.submit();
                }
            });
        });
    </script>
@endsection