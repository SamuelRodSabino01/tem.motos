@extends('layout.main')
@section('title', 'Peças')
@section('content')
    
    <x-pecas.cadastro-peca></x-pecas.cadastro-peca>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Peças cadastradas</h4>
                <p class="card-title-desc">Editar informações</p>
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
                                    <td>R$ {{ $peca->costPrice / 100 }}</td>
                                    <td>R$ {{ $peca->sellingPrice / 100 }}</td>
                                    <td>{{ $peca->stock }}</td>
                                    <td>{{ $peca->description }}</td>
                                    <td>{{ $peca->supplier->name }}</td>
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