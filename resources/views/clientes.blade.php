@extends('layout.main')
@section('title', 'Clientes')
@section('content')
    
    <x-clientes.cadastro-cliente></x-clientes.cadastro-cliente>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Clientes</h4>
                <p class="card-title-desc">Editar informações</p>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->name }}</td>
                                    <td>{{ $cliente->cpf }}</td>
                                    <td>{{ $cliente->phone }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->address }}, {{ $cliente->number }} - {{ $cliente->neighborhood }} - {{ $cliente->zipCode }}</td>
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