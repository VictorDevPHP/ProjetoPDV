<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <div class="container mt-4">
        <h2><i class="fas fa-users"></i> Formulário de Cliente</h2>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do cliente" name="nome">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" placeholder="Digite o endereço do cliente" name="endereco">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF do cliente" name="cpf">
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp:</label>
                <input type="text" class="form-control" id="whatsapp" placeholder="Digite o número de WhatsApp do cliente" name="whatsapp">
            </div>            
            <div class="form-group">
                <label for="saldo">Saldo:</label>
                <input type="text" class="form-control" id="saldo" placeholder="Digite o número de Saldo do cliente" name="saldo">
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
    <script>
        $(document).ready(function () {
            // Aplicar a máscara para números de telefone no formato brasileiro
            $('#whatsapp').inputmask('(99) 99999-9999');
        });
        $(document).ready(function () {
        // Aplicar a máscara para números decimais com duas casas decimais
        $('#saldo').inputmask('decimal', {
            rightAlign: false,
            digits: 2,
            groupSeparator: ',',
            autoGroup: true,
            allowMinus: false
        });
    });
    </script>
    
</div>
