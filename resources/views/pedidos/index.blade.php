@extends('layout.main')
@section('title', 'Pedidos')
@section('content')
    
    <x-pedidos.cadastro-pedido></x-pedidos.cadastro-pedido>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Pedidos</h4>
                <p class="card-title-desc">Editar informações</p>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Cliente</th>
                                <th>Serviços</th>
                                <th>Peças</th>
                                <th>Total</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>
                                        @if ($pedido['status'] == 'pending')
                                            <span class="badge bg-warning text-dark">Pendente</span>
                                        @elseif ($pedido['status'] == 'completed')
                                            <span class="badge bg-success">Concluido</span>
                                        @elseif ($pedido['status'] == 'canceled')
                                            <span class="badge bg-danger">Cancelado</span>  
                                        @endif
                                    </td>
                                    <td>{{ $pedido['client'] }}</td>
                                    <td>{!! $pedido['services'] !!}</td>
                                    <td>{!! $pedido['parts'] !!}</td>
                                    <td>R$ {{ $pedido['total'] }}</td>

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