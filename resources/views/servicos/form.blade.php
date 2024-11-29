@extends('layout.main')
@section('title', 'Serviços')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ isset($data) ? 'Atualizar' : 'Criar' }} Serviço</h4>
                <p class="card-title-desc">Administrar serviços</p>
                <form action="{{ isset($data) ? route('servicos.update', $data->id) : route('servicos.store') }}" method="POST">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label">Nome</label>
                            <input class="form-control" name="name" id="name" value="{{ $data->name ?? '' }}" type="text" placeholder="Ex: Consultoria Técnica">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Preço</label>
                            <input class="form-control" name="price" id="price" value="{{ $data->price ?? '' }}" type="number" step="0.01" placeholder="Ex: 100.00">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Tempo gasto (em horas)</label>
                            <input class="form-control" name="spendingTime" id="spendingTime" value="{{ $data->spendingTime ?? '' }}" type="number" step="0.1" placeholder="Ex: 2.5">
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Descrição</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ex: Serviço de consultoria técnica em...">{{ $data->description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">{{ isset($data) ? 'Atualizar' : 'Criar' }} Serviço</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
