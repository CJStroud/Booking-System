@extends('layouts.admin-settings')

@section('settings-content')

    <div class="col-xs-12">
    <div class="col-xs-12">
        <div class="row">
        <div class="col-xs-12 col-sm-9">
            <h2>Class Management</h2>
        </div>
        <div class="col-xs-12 col-sm-3">
            <a href="{{ route('admin.classes.create') }}" class="btn btn-info">Create</a>
        </div>
        </div>
    </div>
    </div>

    <div class="col-xs-12">
    @foreach ( $classes as $class )
        <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-xs-12 col-sm-6 col-md-8">
            <h4>{{ $class->name }}</h4>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2">
                <a href="{{ route('admin.classes.edit', $class->id) }}" type="submit" class="btn btn-simple">
                    <span class="btn-text">Edit</span>
                    <i class="fa fa-pencil icon-spacing-left"></i>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2">
                <button type="submit" class="btn btn-simple">
                    <span class="btn-text">Delete</span>
                    <i class="fa fa-trash icon-spacing-left"></i>
                </button>
            </div>
        </div>
        </div>
    @endforeach
    </div>

@stop
