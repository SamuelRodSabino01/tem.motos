@extends('layout.main')
@section('title', 'Fornecedores')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Fornecedores</h4>
                <p class="card-title-desc">Visualizar e editar informações</p>

                <div class="row mb-2">
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2" onclick="window.location='{{ route('fornecedores.create') }}'">
                                <i class="mdi mdi-plus mr-1"></i> Novo Fornecedor
                            </button>
                        </div>
                    </div>
                </div>

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
                            @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->name }}</td>
                                    <td>{{ $fornecedor->phone }}</td>
                                    <td style="width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm" title="Editar" href="{{ route('fornecedores.edit', $fornecedor->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" title="Excluir" onclick="if(confirm('Tem certeza que deseja excluir este fornecedor?')) {
                                            event.preventDefault(); 
                                            document.getElementById('delete-supplier-{{ $fornecedor->id }}').submit();
                                        }">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="delete-supplier-{{ $fornecedor->id }}" 
                                            action="{{ route('fornecedores.destroy', $fornecedor->id) }}" 
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
