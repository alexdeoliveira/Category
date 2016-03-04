@extends('layouts.app')
@section('content')

    <h3>Edit Category</h3>
    <hr>

    {!! Form::model($category, ['method' => 'post', 'route' => ['admin.categories.update', $category->id]]) !!}

        <div class="form-group @if($errors->first('parent_id')) has-error @endif">
            {!! Form::label('parent_id', 'Categoria pai') !!}
            {!! Form::select('parent_id',$categories, $category->parent_id, ['id' => 'parent_id', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Name', 'Name') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Active', 'Active') !!}
            {!! Form::checkbox('active', $category->active) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Back</a>
        </div>

    {!! Form::close() !!}
@endsection