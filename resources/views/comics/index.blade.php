@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comics List</h1>

    <a href="{{ route('comics.create') }}" class="btn btn-primary">Create New Comic</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Series</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>
                        <a href="{{ route('comics.show', $comic) }}" class="btn btn-info">View</a>
                        <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('comics.destroy', $comic) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
