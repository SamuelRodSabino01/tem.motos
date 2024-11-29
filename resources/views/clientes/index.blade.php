@extends('layout.main')
@section('title', 'Clientes')
@section('content')
        
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Clientes</h4>
                <p class="card-title-desc">visualizar informações</p>

                <div class="row mb-2">
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2" onclick="window.location='{{ route('clientes.create') }}'" >
                                <i class="mdi mdi-plus mr-1"></i> Novo Cliente
                            </button>
                        </div>
                    </div>
                </div>

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
                                        <a class="btn btn-outline-secondary btn-sm" title="Edit" href="{{ route('clientes.edit', $cliente->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" title="Delete" onclick="if(confirm('Tem certeza que deseja excluir este cliente?')) {
                                            event.preventDefault(); 
                                            document.getElementById('delete-client-{{ $cliente->id }}').submit();
                                        }">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="delete-client-{{ $cliente->id }}" 
                                            action="{{ route('clientes.destroy', $cliente->id) }}" 
                                            method="POST" 
                                            style="display: none;">
                                          @csrf
                                          @method('DELETE')
                                      </form>
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