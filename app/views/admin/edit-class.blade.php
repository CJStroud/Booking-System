@extends('layouts.admin-settings')

@section('settings-content')

<div class="panel panel-default panel-settings">
    <div class="panel-heading">Edit class</div>
    <div class="panel-body">
        {{ Form::model($class, ['route' => ['admin.classes.update', $class->id], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
            {{ Form::hidden('id', $class->id) }}
            <div class="form-group">
                <div class="col-xs-12">
                    {{ Form::label('name', 'Name') }}

                    {{ Form::text('name', Input::old('name'), ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <label>
                        {{ Form::checkbox('active', Input::old('active'), ['class' => 'form-control']) }} Active
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12 col-sm-4 col-md-2">
                    <button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Update</span><span class="btn-addon btn-addon-primary"><i class="fa fa-arrow-right"></i></span></button>
                </div>
            </div>

        {{ Form::close() }}
    </div>
</div>


@stop
