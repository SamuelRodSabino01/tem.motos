@extends('layout.main')
@section('title', 'Pedidos')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ isset($order) ? 'Atualizar' : 'Criar' }} Pedido</h4>
                <p class="card-title-desc">Administrar pedidos</p>
                <form action="{{ isset($order) ? route('pedidos.update', $order->id) : route('pedidos.store') }}" method="POST">
                    @csrf
                    @if (isset($order))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <!-- Cliente -->
                        <div class="col-md-6">
                            <label class="col-form-label">Cliente</label>
                            <select class="form-control" name="client_id" id="client_id">
                                <option value="">Selecione o cliente</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ (isset($order) && $order->client_id == $client->id) ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Selecione o status</option>
                                <option value="pending" {{ (isset($order) && $order->status == 'pending') ? 'selected' : '' }}>
                                    Pendente
                                </option>
                                <option value="completed" {{ (isset($order) && $order->status == 'completed') ? 'selected' : '' }}>
                                    Concluido
                                </option>
                                <option value="canceled" {{ (isset($order) && $order->status == 'canceled') ? 'selected' : '' }}>
                                    Cancelado
                                </option>
                            </select>
                        </div>

                        <!-- Serviços -->
                        <div class="col-md-12 mt-3">
                            <label class="col-form-label">Serviços</label>
                            <div id="service-container">
                                <!-- Serviços Existentes -->
                                @if (isset($order) && $order->service->count())
                                    @foreach ($order->service as $index => $service)
                                        <div class="service-row mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="services[{{ $index }}][id]" required>
                                                        <option value="">Selecione o serviço</option>
                                                        @foreach ($services as $s)
                                                            <option value="{{ $s->id }}" {{ $service->id == $s->id ? 'selected' : '' }}>
                                                                {{ $s->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" name="services[{{ $index }}][quantity]" type="number" min="1" step="1" placeholder="Quantidade" value="{{ $service->pivot->quantity }}" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger remove-service" style="width: 100%;">Remover</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" id="add-service" class="btn btn-primary">Adicionar Serviço</button>
                        </div>

                        <!-- Peças -->
                        <div class="col-md-12 mt-3">
                            <label class="col-form-label">Peças</label>
                            <div id="part-container">
                                <!-- Peças Existentes -->
                                @if (isset($order) && $order->part->count())
                                    @foreach ($order->part as $index => $part)
                                        <div class="part-row mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="parts[{{ $index }}][id]" required>
                                                        <option value="">Selecione a peça</option>
                                                        @foreach ($parts as $p)
                                                            <option value="{{ $p->id }}" {{ $part->id == $p->id ? 'selected' : '' }}>
                                                                {{ $p->name }} - R$ {{ number_format($p->sellingPrice, 2, ',', '.') }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control" name="parts[{{ $index }}][quantity]" type="number" min="1" step="1" placeholder="Quantidade" value="{{ $part->pivot->quantity }}" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger remove-part" style="width: 100%;">Remover</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" id="add-part" class="btn btn-primary">Adicionar Peça</button>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">{{ isset($order) ? 'Atualizar' : 'Criar' }} Pedido</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Serviços
            const serviceContainer = document.getElementById('service-container');
            const addServiceBtn = document.getElementById('add-service');
            let serviceIndex = {{ isset($order) ? $order->service->count() : 0 }};

            addServiceBtn.addEventListener('click', () => {
                const newService = `
                    <div class="service-row mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="services[${serviceIndex}][id]" required>
                                    <option value="">Selecione o serviço</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="services[${serviceIndex}][quantity]" type="number" min="1" step="1" placeholder="Quantidade" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-service" style="width: 100%;">Remover</button>
                            </div>
                        </div>
                    </div>
                `;
                serviceContainer.insertAdjacentHTML('beforeend', newService);
                serviceIndex++;
            });

            // Peças
            const partContainer = document.getElementById('part-container');
            const addPartBtn = document.getElementById('add-part');
            let partIndex = {{ isset($order) ? $order->part->count() : 0 }};

            addPartBtn.addEventListener('click', () => {
                const newPart = `
                    <div class="part-row mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="parts[${partIndex}][id]" required>
                                    <option value="">Selecione a peça</option>
                                    @foreach ($parts as $part)
                                        <option value="{{ $part->id }}">{{ $part->name }} - R$ {{ number_format($part->sellingPrice, 2, ',', '.') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="parts[${partIndex}][quantity]" type="number" min="1" step="1" placeholder="Quantidade" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-part" style="width: 100%;">Remover</button>
                            </div>
                        </div>
                    </div>
                `;
                partContainer.insertAdjacentHTML('beforeend', newPart);
                partIndex++;
            });

            // Remoção Dinâmica
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('remove-service')) {
                    e.target.closest('.service-row').remove();
                }
                if (e.target.classList.contains('remove-part')) {
                    e.target.closest('.part-row').remove();
                }
            });
        });
    </script>


@endsection
