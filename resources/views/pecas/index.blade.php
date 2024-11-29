@extends('layout.main')
@section('title', 'Peças')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Peças cadastradas</h4>
                <p class="card-title-desc">Visualizar e editar informações</p>

                <div class="row mb-2">
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2" onclick="window.location='{{ route('pecas.create') }}'">
                                <i class="mdi mdi-plus mr-1"></i> Nova Peça
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Preço de compra</th>
                                <th>Preço de venda</th>
                                <th>Quantidade</th>
                                <th>Descrição</th>
                                <th>Fornecedor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pecas as $peca)
                                <tr>
                                    <td>{{ $peca->code }}</td>
                                    <td>{{ $peca->name }}</td>
                                    <td>R$ {{ number_format($peca->costPrice, 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($peca->sellingPrice, 2, ',', '.') }}</td>
                                    <td>{{ $peca->stock }}</td>
                                    <td>{{ $peca->description }}</td>
                                    <td>{{ $peca->supplier->name }}</td>
                                    <td style="width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm" title="Editar" href="{{ route('pecas.edit', $peca->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" title="Excluir" onclick="if(confirm('Tem certeza que deseja excluir esta peça?')) {
                                            event.preventDefault(); 
                                            document.getElementById('delete-piece-{{ $peca->id }}').submit();
                                        }">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="delete-piece-{{ $peca->id }}" 
                                            action="{{ route('pecas.destroy', $peca->id) }}" 
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
