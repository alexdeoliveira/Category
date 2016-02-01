@extends('layouts.app')
@section('content')

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