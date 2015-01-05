@include('layouts.master')

@section('content')
<div class="container">

    <h4>Add Class</h4>
    {{Form::open(array('route' => ['class.store'], 'method' =>'post'))}}

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="table-element">
                <input name="name" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="table-element">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>

    {{Form::close()}}

    <h2>Active Classes</h2>
    @foreach ($classes as $class)
    <div class="row">
        <div class="table">
            <div class="table-row">
                <div class="col-sm-6 col-xs-12">
                    <div class="table-element">{{ $class->name }}</div>
                </div>

                {{ Form::open(array('action' => ['ClassController@disable', $class->id], 'method' => 'post')) }}
                <div class="col-sm-2 col-xs-12">
                    <div class="table-element"><button class="btn btn-warning">Disable</button></div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    @endforeach

    <h2>Disabled Classes</h2>
    @foreach ($disabled as $class)
    <div class="row">
        <div class="table">
            <div class="table-row">
                <div class="col-sm-6 col-xs-12">
                    {{ $class->name }}
                </div>
                {{ Form::open(array('action' => ['ClassController@enable', $class->id], 'method' => 'post')) }}
                <div class="col-sm-2 col-xs-6">
                    <button class="btn btn-primary">Re-enable</button>
                </div>
                {{Form::close()}}
                {{ Form::open(array('route' => ['class.destroy', $class->id], 'method' => 'delete')) }}
                <div class="col-sm-2 col-xs-6">
                    <button class="btn btn-danger">Delete</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    @endforeach

</div>

@stop
