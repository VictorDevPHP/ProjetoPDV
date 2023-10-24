<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="container mt-4">
        <h2><i class="fas fa-users"></i> Formulário de Cliente</h2>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do cliente" name="nome" required="required" @if(isset($cliente->nome)) value="{{ $cliente->nome }}" @endif>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" placeholder="Digite o endereço do cliente" name="endereco" required="required" @if(isset($cliente->endereco)) value="{{ $cliente->endereco }}" @endif>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF do cliente" name="cpf" required="required" @if(isset($cliente->cpf)) value="{{ $cliente->cpf }}" @endif>
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp:</label>
                <input type="text" class="form-control" id="whatsapp" placeholder="Digite o número de WhatsApp do cliente" name="whatsapp" required="required" @if(isset($cliente->whatsapp)) value="{{ $cliente->whatsapp }}" @endif>
            </div>            
            <div class="form-group">
                <label for="saldo">Saldo:</label>
                <input type="text" class="form-control" id="saldo" placeholder="Digite o número de Saldo do cliente, Exemplo 150.00" name="saldo" required="required" @if(isset($cliente->saldo)) value="{{ $cliente->saldo }}" @endif>
            </div>
            <div class="mt-2"></div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        @if (session()->has('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
        <script>
            $(document).ready(function () {
                $('#saldo').inputmask('decimal', {
                    radixPoint: ',',
                    digits: 2,
                    rightAlign: false,
                    groupSeparator: '',
                    autoGroup: true,
                    allowMinus: false
                });
            });
        </script>
        
    @endif
    </div>
</div>
