@extends('layouts.app')
@section('content')

    <h3>Create Category</h3>

    {!! Form::open(['method' => 'post', 'route' => ['admin.categories.store']]) !!}

        <div class="form-group @if($errors->first('parent_id')) has-error @endif">
            {!! Form::label('parent_id', 'Categoria pai') !!}
            {!! Form::select('parent_id',$categories, null, ['id' => 'parent_id', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Active', 'Active') !!}
            {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Back</a>
        </div>

    {!! Form::close() !!}
@endsection