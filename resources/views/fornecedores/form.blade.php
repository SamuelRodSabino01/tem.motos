@extends('layout.main')
@section('title', 'Clientes')
@section('content')
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ isset($data) ? 'Atualizar' : 'Criar' }} Clientes</h4>
                <p class="card-title-desc">Administrar cliente</p>
                <form action="{{ isset($data) ? route('clientes.update', $data->id) : route('clientes.store') }}" method="POST">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <label class="col-form-label">Nome completo</label>
                            <input class="form-control" name="name" id="name" value="{{ $data->name ?? '' }}"  type="text" placeholder="Ex: João da Silva">
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">CPF</label>
                            <input class="form-control" name="cpf" id="cpf" value="{{ $data->cpf ?? '' }}" oninput="mascaraCPF(this)" maxlength="14" name="cpf" id="cpf" type="text" placeholder="Ex: 000.000.000-00">
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Cep</label>
                            <input class="form-control" name="zipCode" id="zipCode" value="{{ $data->zipCode ?? '' }}" type="text" placeholder="37130000">
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Rua</label>
                            <input class="form-control" name="address" id="address" value="{{ $data->address ?? '' }}" type="text" placeholder="Ex: Av. Brasil">
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Número</label>
                            <input class="form-control" name="number" id="number" value="{{ $data->number ?? '' }}" type="text" placeholder="Ex: 0000">
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Bairro</label>
                            <input class="form-control" name="neighborhood" id="neighborhood" value="{{ $data->neighborhood ?? '' }}" type="text" placeholder="Ex: Centro">
                        </div>
                        <div class="col-md-8">
                            <label class="col-form-label">E-mail</label>
                            <input class="form-control" name="email" id="email" value="{{ $data->email ?? '' }}" type="email" placeholder="Ex: josedasilva@email.com">
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Telefone</label>
                            <input class="form-control" name="phone" id="phone" value="{{ $data->phone ?? '' }}" maxlength="15" oninput="mascaraCelular(this)" name="telefone" type="phone" placeholder="Ex: (00) 00000-0000">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">{{ isset($data) ? 'Atualizar' : 'Criar' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection