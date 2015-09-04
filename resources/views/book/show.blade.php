@extends('app')
@section('content')
    <div class="container">
        <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders to a table:</p>
        <table class="table table-bordered">
            <tr>
                <th><label for="title">Title</label></th>
                <th>{{ $book->title }}</th>
            </tr>
            <tr>
                <th><label for="bookPages">Number of pages</label></th>
                <th>{{ $book->bookPages }}</th>
            </tr>
            <tr>
                <th><label for="email">Price</label></th>
                <th>{{ $book->price }}</th>
            </tr>
            <tr>
                <th><label for="email">Publisher</label></th>
                <th>{{ $book->publisher }}</th>
            </tr>
        </table>


        <a href="{{ action('BookController@index') }}" class="btn btn-link">Return</a>
    </div>
@stop