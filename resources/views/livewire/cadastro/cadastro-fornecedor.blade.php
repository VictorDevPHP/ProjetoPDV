<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="container mt-4">
        <h2><i class="fas fa-truck-loading"></i> Formulário de Fornecedor </h2>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do Fornecedor"
                    name="nome" required="required">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" placeholder="Digite o Endereço"
                    name="endereco" required="required">
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" placeholder="Digite o CNPJ" name="cnpj"
                    required="required">
            </div>
            <div class="form-group">
                <label for="contato">Contato:</label>
                <input type="text" class="form-control" id="contato" placeholder="Digite um número de contato"
                    name="contato" required="required">
            </div>
            <div class="mt-2"></div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        @if (session()->has('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
        @endif

    </div>
</div>
