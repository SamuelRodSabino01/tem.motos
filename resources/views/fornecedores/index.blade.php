@extends('layout.main')
@section('title', 'Clientes')
@section('content')
        
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Fornecedores</h4>
                <p class="card-title-desc">Editar informações</p>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->name }}</td>
                                    <td>{{ $cliente->phone }}</td>
                                    <td style="width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection