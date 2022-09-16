@extends('layouts.main')

@section('title', 'Index')

@section('content')
    <div class="container-lg">
        @if (session('result-message'))
            <div class="alert alert-warning" role="alert">
                <strong>{{session('result-message')}}</strong> 
            </div>
        @endif
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
                    <th scope="col"><strong>Delete</strong></th>
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
                            <a href="{{route('comics.edit', $comic->slug)}}">
                                <button type="button" class="btn btn-secondary">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('comics.destroy', $comic->slug)}}" method="post" class="ms_form_delete" title-delete="{{$comic->title}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul>
        </ul>
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