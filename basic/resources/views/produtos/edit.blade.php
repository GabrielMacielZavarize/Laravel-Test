<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>

    <!-- Link para voltar à lista de produtos -->
    <a href="{{ route('produtos.index') }}">Voltar para Lista de Produtos</a>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário para editar o produto -->
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Adiciona um campo de método para atualizar -->

        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" value="{{ old('preco', $produto->preco) }}" required step="0.01">

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
