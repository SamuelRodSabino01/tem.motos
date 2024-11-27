<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cadastro de Clientes</h4>
            <p class="card-title-desc">Adicionar novo cliente</p>
            <form action="">
                <div class="row">
                    <div class="col-md-8">
                        <label class="col-form-label">Nome completo</label>
                        <input class="form-control"  type="text" placeholder="Ex: João da Silva">
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label">CPF</label>
                        <input class="form-control" oninput="mascaraCPF(this)" maxlength="14" name="cpf" id="cpf" type="text" placeholder="Ex: 000.000.000-00">
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label">Rua</label>
                        <input class="form-control" type="text" placeholder="Ex: Av. Brasil">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">Número</label>
                        <input class="form-control" type="text" placeholder="Ex: 0000">
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label">Bairro</label>
                        <input class="form-control" type="text" placeholder="Ex: Centro">
                    </div>
                    <div class="col-md-8">
                        <label class="col-form-label">E-mail</label>
                        <input class="form-control" type="email" placeholder="Ex: josedasilva@email.com">
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label">Telefone</label>
                        <input class="form-control" maxlength="15" oninput="mascaraCelular(this)" name="telefone" type="phone" placeholder="Ex: (00) 00000-0000">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>