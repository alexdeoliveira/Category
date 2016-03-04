@extends('layouts.app')
@section('content')
    
    <div class="row">
        <div class="col-md-8">
            <h3>Categories</h3>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Create Category</a>
        </div>
    </div>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50%">Nome</th>
                <th width="15%">Situacao</th>
                <th width="35%">Acao</th>
            </tr>
        </thead>
        <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->active }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                            <a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection