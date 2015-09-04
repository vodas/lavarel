
@extends('template')
@section('content')
    <div class="page-header" >
        <h1>Edit</h1>
    </div>
    @if ( $errors->count() > 0 )
        <div class="alert alert-danger">
            <ul>
                @foreach( $errors->all() as $message )</p>
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ action('BookController@update') }}" method="post" role="form" >
        <input type="hidden" name="id" value="{{ $book->id }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $book->title }}"/>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </div>
        <div class="form-group">
            <label for="bookPages">Number of pages</label><br />
            <input type="text" class="form-control" name="bookPages" value="{{ $book->bookPages }}"/>
        </div>
        <div class="form-group">
            <label for="email">Price</label><br />
            <input type="text" class="form-control" name="price" value="{{ $book->price }}"/>
        </div>
        <div class="form-group">
            <label for="email">Publisher</label><br />
            <input type="text" class="form-control" name="publisher" value="{{ $book->publisher }}"/>
        </div>

        <input type="submit" value="Add" class="btn btn-primary" />
        <a href="{{ action('BookController@index') }}" class="btn btn-link">Return</a>
    </form>
@stop