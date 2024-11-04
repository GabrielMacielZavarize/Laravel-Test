<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Define o viewport para melhorar a responsividade -->
    <title>Lista de Produtos</title> <!-- Título da página -->
</head>
<body>
    <h1>Lista de Produtos</h1> <!-- Título principal da página -->
    <!-- Link para a página de criação de um novo produto -->
    <a href="{{ route('produtos.create') }}">Adicionar Novo Produto</a>
    <ul> <!-- Início de uma lista não ordenada para exibir produtos -->
        @foreach ($produtos as $produto) <!-- Laço que itera por cada produto passado para a view -->
            <li> <!-- Cada item da lista representa um produto -->
                {{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}
                <!-- Exibe o nome do produto e o preço formatado em reais -->
                                 <!-- Link para editar o produto -->
                <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                <!-- Formulário para excluir o produto -->
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') <!-- Indica que é uma requisição de exclusão -->
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
