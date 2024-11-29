@extends('layout.main')
@section('title', 'Peças')
@section('content')
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ isset($data) ? 'Atualizar' : 'Criar' }} Peças</h4>
                <p class="card-title-desc">Administrar peças</p>
                <form action="{{ isset($data) ? route('pecas.update', $data->id) : route('pecas.store') }}" method="POST">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <label class="col-form-label">Nome</label>
                            <input class="form-control" name="name" id="name" value="{{ $data->name ?? '' }}" type="text" placeholder="Ex: Parafuso">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Código</label>
                            <input class="form-control" name="code" id="code" value="{{ $data->code ?? '' }}" type="text" placeholder="Ex: ABC123">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Preço de Custo</label>
                            <input class="form-control" name="costPrice" id="costPrice" value="{{ $data->costPrice ?? '' }}" type="number" step="0.01" placeholder="Ex: 10.50">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Preço de Venda</label>
                            <input class="form-control" name="sellingPrice" id="sellingPrice" value="{{ $data->sellingPrice ?? '' }}" type="number" step="0.01" placeholder="Ex: 15.75">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Estoque</label>
                            <input class="form-control" name="stock" id="stock" value="{{ $data->stock ?? '' }}" type="number" placeholder="Ex: 100">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Fornecedor</label>
                            <select class="form-control" name="supplier_id" id="supplier_id">
                                <option value="">Selecione o fornecedor</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ isset($data) && $data->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Descrição</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ex: Peça utilizada para...">{{ $data->description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">{{ isset($data) ? 'Atualizar' : 'Criar' }} Peça</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
