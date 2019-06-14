@extends('layouts.template')

@section('title', 'GRTS Digital')

@section('sidebar')
    @parent
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <a class="btn btn-success" href="{{ route('cliente.create') }}">Novo Cliente</a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row mt-5">
                <div class="col-md-12">
                    <table id="clientes" class=" table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Sexo</th>
                                <th>Nascimento</th>
                                <th>Logradouro</th>
                                <th>OPÇÕES</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(!$cliente->isEmpty())
                                @foreach($cliente as $c)
                                    <tr>
                                        <td>{{ $c->nome }}</td>
                                        <td>{{ $c->email }}</td>
                                        <td>{{ $c->telefone }}</td>
                                        <td>{{ $c->sexo }}</td>
                                        <td>{{ $c->nascimento }}</td>
                                        <td>{{ $c->endereco->logradouro }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('cliente.edit', $c->id) }}">Editar</a>
                                            <a class="btn btn-danger btn-sm" href="{{ route('cliente.delete',$c->id) }}">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('javascript')
    <script>
        $(document).ready( function () {
            $('#clientes').DataTable({
                "language": {
                    "lengthMenu": "Exibir _MENU_ registros por páginas",
                    "zeroRecords": "Não encontrado",
                    "info": " página _PAGE_ de _PAGES_",
                    "infoEmpty": "Não encontrado",
                    "infoFiltered": "(filtrado total por _MAX_ )",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                }
            });
        } );
    </script>
@endsection