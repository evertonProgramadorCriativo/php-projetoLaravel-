<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // Adicione esta linha

class ClienteController extends Controller
{
    /**
     * Exibir uma listagem de clientes.
     */
    public function index()
    {
        $clientes = Cliente::all();
    return view('clientes.index', compact('clientes'));
    }

    /**
     * Mostrar o formulário para criação de um novo recurso.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nome' => 'required',
        'email' => 'nullable|email',
        'telefone' => 'nullable',
        'endereco' => 'nullable'
    ]);

    Cliente::create($request->all());

    return redirect()->route('clientes.index')
        ->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
{
  $cliente = Cliente::findOrFail($id);

   

    return view('clientes.edit', compact('cliente'));
    
     
}

public function update(Request $request, $id)
{
    $cliente = Cliente::findOrFail($id);
    
    // Sua validação aqui
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'nullable|string|max:14',
        'email' => 'nullable|email',
        'telefone' => 'nullable|string',
        'endereco' => 'nullable|string',
    ]);
    
    $cliente->update($validated);
    
    
    
    return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
}

public function destroy($id)
{
    $cliente = Cliente::findOrFail($id);
    $cliente->delete();

    return redirect()->route('clientes.index')
        ->with('success', 'Cliente excluído com sucesso!');
}
}
