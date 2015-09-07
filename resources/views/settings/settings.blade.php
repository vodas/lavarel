@extends('app')
@section('content')
    <div class="container">
        <div class="page-header" >
            <h1>Twoje ustawienia</h1>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ action('SettingsController@update') }}" method="post" role="form" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{Auth::user()->id }}">
            <div class="form-group">
                <label for="title">E-mail</label>
                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" />
            </div>
            <div class="form-group">
                <label for="bookPages">Name</label><br />
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" />
            </div>

            <input type="submit" value="Add" class="btn btn-primary" />
        </form>
    </div>
@stop