@extends('layouts.app')
@section('content')
    
    <div class="col-md-8">
        <h3>Categories</h3>
    </div>
    <div class="col-md-4 text-right">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Create Category</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Situacao</th>
                <th>Acao</th>
            </tr>
        </thead>
        <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->active }}</td>
                        <td></td>
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