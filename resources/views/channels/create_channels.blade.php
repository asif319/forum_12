@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create A Channel</div>

                    <div class="panel-body">
                        <form method="POST" action="/channels">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="title">Name:</label>
                                <input type="text" name="name" class="form-control" id="title" value="{{old('name')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="title">Slug:</label>
                                <input type="text" name="slug" class="form-control" id="title" value="{{old('slug')}}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish</button>

                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
