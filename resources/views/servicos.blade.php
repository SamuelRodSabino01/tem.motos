@extends('layout.main')
@section('title', 'Serviços')
@section('content')
    
    <x-servicos.cadastro-servico></x-servicos.cadastro-servico>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Serviços</h4>
                <p class="card-title-desc">Editar informações</p>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Tempo gasto (horas)</th>
                                <th>Descrição</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicos as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->price / 100 }}</td>
                                    <td>{{ $service->spendingTime }}</td>
                                    <td>{{ $service->description }}</td>
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