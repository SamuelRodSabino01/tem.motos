<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cadastro de Pedidos</h4>
            <p class="card-title-desc">Adicionar novo pedido</p>
            <form action="">
                <div class="row">
                    <div class="col-md-2">
                        <label class="col-form-label">Código do cliente</label>
                        <input class="form-control"  type="text">
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label">Nome do cliente</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label">CPF</label>
                        <input class="form-control" oninput="mascaraCPF(this)" maxlength="14" name="cpf" id="cpf" type="text">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">Código do Serviço</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-8">
                        <label class="col-form-label">Tipo do Serviço</label>
                        <input class="form-control" type="email">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">Quantidade</label>
                        <input class="form-control" type="email">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">Valor Unitário</label>
                        <input class="form-control" type="phone">
                    </div>
                    <div class="col-md-2">
                        <label class="col-form-label">Valor Total</label>
                        <input class="form-control" type="phone">
                    </div>
                </div>
                <div class="col-md-2 mt-3">
                    <button class="btn btn-azul" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>