@extends('layout.main')
@section('title', 'Pedidos')
@section('content')
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Pedidos</h4>
                <p class="card-title-desc">Visualizar e editar informações</p>

                <div class="row mb-2">
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2" onclick="window.location='{{ route('pedidos.create') }}'">
                                <i class="mdi mdi-plus mr-1"></i> Novo Pedido
                            </button>
                        </div>
                    </div>
                </div>

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
                                            <span class="badge bg-success">Concluído</span>
                                        @elseif ($pedido['status'] == 'canceled')
                                            <span class="badge bg-danger">Cancelado</span>  
                                        @endif
                                    </td>
                                    <td>{{ $pedido['client'] }}</td>
                                    <td>{!! $pedido['services'] !!}</td>
                                    <td>{!! $pedido['parts'] !!}</td>
                                    <td>R$ {{ $pedido['total'] }}</td>
                                    <td style="width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm" title="Editar" href="{{ route('pedidos.edit', $pedido['id']) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" title="Excluir" onclick="if(confirm('Tem certeza que deseja excluir este pedido?')) {
                                            event.preventDefault(); 
                                            document.getElementById('delete-order-{{ $pedido['id'] }}').submit();
                                        }">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form id="delete-order-{{ $pedido['id'] }}" 
                                            action="{{ route('pedidos.destroy', $pedido['id']) }}" 
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