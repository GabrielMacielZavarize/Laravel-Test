<?php

namespace App\Http\Controllers; // Define o namespace para organizar o código e evitar conflitos de nomes.

use App\Models\Produto; // Importa o modelo Produto para usar dados da tabela produtos.
use Illuminate\Http\Request; // Importa o Request para lidar com as requisições HTTP.

class TestController extends Controller // Define uma classe de controlador chamada TestController que estende a classe base Controller.
{
    // Função para listar produtos. Esse método será acionado ao acessar a rota configurada para exibir produtos.
    public function listarProdutos()
    {
        // Obtém todos os registros da tabela produtos usando o Eloquent ORM e armazena na variável $produtos.
        $produtos = Produto::all();

        // Retorna a view "produtos.index" e passa os dados dos produtos para serem exibidos.
        // 'compact' cria um array associativo onde a chave 'produtos' mapeia para o valor da variável $produtos.
        return view('produtos.index', compact('produtos'));
    }
    public function mostrarFormulario()
    {
        // Retorna a view com o formulário de criação de produto.
        return view('produtos.create');
    }
    public function salvarProduto(Request $request)
    {
        // Valida os dados do formulário antes de salvar.
        $request->validate([
        'nome' => 'required|string|max:255', // O nome é obrigatório, deve ser texto e ter no máximo 255 caracteres.
        'preco' => 'required|numeric|min:0', // O preço é obrigatório, deve ser numérico e não negativo.
        ]);

        Produto::create([
        'nome' => $request->nome, // Define o campo nome com o valor enviado no formulário.
        'preco' => $request->preco, // Define o campo preco com o valor enviado no formulário.
        ]);
        return redirect()->route('produtos.index');
    }
    public function editarProduto($id)
    {
        // Recupera o produto pelo ID. Se não for encontrado, retorna um erro 404.
        $produto = Produto::findOrFail($id);

        // Retorna a view de edição e passa o produto para a view.
        return view('produtos.edit', compact('produto'));
    }
    public function atualizarProduto(Request $request, $id) {
        // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
        ]);

        // Encontra o produto pelo ID e atualiza seus dados
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->save(); // Salva as alterações no banco de dados

        // Redireciona de volta para a lista de produtos
        return redirect()->route('produtos.index');
    }
    public function excluirProduto($id) {
        // Encontra o produto pelo ID e exclui
        $produto = Produto::findOrFail($id);
        $produto->delete(); // Exclui o produto do banco de dados

        // Redireciona de volta para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
