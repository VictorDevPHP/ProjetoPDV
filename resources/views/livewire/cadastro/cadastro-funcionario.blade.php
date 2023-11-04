<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.js"></script>
    <div class="container mt-4">
        <h2><i class="fas fa-users"></i> Formulário de Funcionario </h2>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do Funcionario"
                    name="nome" required="required"
                    @if (isset($funcionario->nome)) value="{{ $funcionario->nome }}" @endif>
            </div>
            <div class="form-group">
                <label for="contato">Contato:</label>
                <input type="text" class="form-control" id="contato"
                    placeholder="Digite o contato (WhatsApp, email, fax)" name="contato" required="required"
                    @if (isset($funcionario->contato)) value="{{ $funcionario->contato }}" @endif>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF do Funcionario"
                    name="cpf" required="required"
                    @if (isset($funcionario->cpf)) value="{{ $funcionario->cpf }}" @endif>
            </div>
            <div class="form-group">
                <label for="nascimento">Data de Nascimento:</label>
                <input type="text" class="form-control" id="nascimento"
                    placeholder="Digite a data de nascimento 01/01/1999" name="nascimento" required="required"
                    @if (isset($funcionario->nascimento)) value="{{ $funcionario->nascimento }}" @endif>
            </div>
            <div class="form-group">
                <label for="admissao">Data de Adimissão:</label>
                <input type="text" class="form-control" id="admissao"
                    placeholder="Digite a data de admissão 01/01/1999" name="admissao" required="required"
                    @if (isset($funcionario->admissao)) value="{{ $funcionario->admissao }}" @endif>
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="number" class="form-control" id="salario" placeholder="Digite o salario do Funcionario"
                    name="salario" required="required"
                    @if (isset($funcionario->salario)) value="{{ $funcionario->salario }}" @endif>
            </div>
            <div class="mt-2"></div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        @if (session()->has('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
            <script>
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Usuario Atualizado Com Sucesso',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

    </div>
</div>
