<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index(Cliente $cliente)
    {
        $cliente = $cliente->all();
        return view('cliente.index', compact('cliente'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function getLogradouroByCep()
    {
        $client = new \GuzzleHttp\Client();
        $url = "viacep.com.br/ws/{$_GET['cep']}/json/";

        $response = $client->request('GET', $url, ['headers' =>
            [
                'Content-Type' => 'application/json'
            ]
        ]);

        $response = json_encode((string)$response->getBody());

        return $response;
    }

    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        $endereco = $cliente->endereco()->create($request->all());
        return redirect()->route('cliente.index')->with('success', 'Cliente cadastrado com sucesso !');
    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        $cliente->endereco->update($request->all());
        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso !');
    }

    public function delete($id)
    {
//        dd($id);
        $cliente = Cliente::findOrFail($id);
        $cliente->endereco()->delete();
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso !');
    }
}
