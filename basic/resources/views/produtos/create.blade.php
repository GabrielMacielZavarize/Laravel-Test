<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Produto</title>
</head>
<body>
    <h1>Criar Novo Produto</h1>
    <!-- Link para voltar à lista de produtos -->
    <a href="{{ route('produtos.index') }}">Voltar para Lista de Produtos</a>
    
    <!-- Exibe mensagens de erro de validação, se houver -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> <!-- Exibe cada erro de validação -->
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário para enviar um novo produto -->
    <form action="{{ route('produtos.store') }}" method="POST"> <!-- Envia os dados para a rota produtos.store -->
        @csrf <!-- Diretiva para proteção contra ataques CSRF -->

        <!-- Campo para o nome do produto -->
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required> <!-- Campo de texto obrigatório para o nome -->

        <!-- Campo para o preço do produto -->
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" required step="0.01"> <!-- Campo numérico obrigatório para o preço, com passos de centavos -->

        <!-- Botão para enviar o formulário -->
        <button type="submit">Salvar Produto</button>
    </form>
</body>
</html>
