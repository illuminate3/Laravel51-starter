@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Edit Settings</h1>
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name}} Account Settings</div>
                <div class="panel-body">
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/@'.$user->name) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Organisation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="organisation" value="{{ $user->organisation }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Website</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="website" value="{{ $user->website }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
