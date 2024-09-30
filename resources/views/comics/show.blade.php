@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $comic->title }}</h1>

    <p>{{ $comic->description }}</p>
    <p>Price: ${{ $comic->price }}</p>
    <p>Series: {{ $comic->series }}</p>
    <p>Sale Date: {{ $comic->sale_date }}</p>
    <p>Type: {{ $comic->type }}</p>

    <a href="{{ route('comics.index') }}" class="btn btn-primary">Back to Comics List</a>
</div>
@endsection
