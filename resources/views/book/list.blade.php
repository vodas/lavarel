@extends('template')
@section('content')
    <script>
        $(document).ready(function(){    $('.dataTable').DataTable();});
    </script>

    <div class="page-header" >
        <h1>Library</h1>
        </p></div>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('BookController@create') }}" class="btn btn-info">Add New Book</a>
        </div>
    </div>
    @if ($books->isEmpty())
        There are no books!
    @else
        <table class="dataTable">
            <thead>
            <tr>
                <th>Title</th>
                <th>Number of pages</th>
                <th>Price</th>
                <th>Publisher</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->bookPages }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>
                        <a href="{{ action('BookController@edit', $book->id) }}" class="btn btn-default">Edit</a>

                        <a href="{{ action('BookController@show', $book->id) }}" class="btn btn-default">Show</a>

                        <a href="{{ action('BookController@destroy', $book->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop