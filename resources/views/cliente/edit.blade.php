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
                    <h1 class="text-center">Atualizar Cliente</h1>
                </div>
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <l1>{{ $error }}</l1><br>
                @endforeach
            @endif

            <form action="{{ route('cliente.update', $cliente->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for=""><b>Nome :</b></label>
                        <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" value="{{ $cliente->nome }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for=""><b>E-mail :</b></label>
                        <input type="email" class="form-control" name="email" placeholder="Digite seu email" value="{{ $cliente->email }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Telefone :</b></label>
                        <input type="text" class="form-control" name="telefone" placeholder="Digite seu telefone" value="{{ $cliente->telefone }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for=""><b>Sexo :</b></label>
                        <select class="form-control" name="sexo" id="">
                            <option {{ $cliente->sexo == 1 ? 'selected' : '' }} value="1">Masculino</option>
                            <option {{ $cliente->sexo == 2 ? 'selected' : '' }} value="2">Feminino</option>
                            <option {{ $cliente->sexo == 3 ? 'selected' : '' }} value="3">Não especificado</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Nascimento :</b></label>
                        <input type="date" class="form-control" name="nascimento" value="{{ $cliente->nascimento }}">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for=""><b>Cep :</b></label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite a cep" value="{{ $cliente->endereco->cep }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Logradouro :</b></label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Digite o logradouro" value="{{ $cliente->endereco->logradouro }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for=""><b>Numero :</b></label>
                        <input type="text" class="form-control" name="numero" placeholder="Digite o número" value="{{ $cliente->endereco->numero }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for=""><b>Bairro :</b></label>
                        <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Digite o bairro" value="{{ $cliente->endereco->bairro }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Cidade :</b></label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" value="{{ $cliente->endereco->cidade }}">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for=""><b>Complemento :</b></label>
                        <input type="text" class="form-control" name="complemento" placeholder="Digite o complemento" value="{{ $cliente->endereco->complemento }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for=""><b>Estado :</b></label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado" value="{{ $cliente->endereco->estado }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for=""><b>País :</b></label>
                        <input type="text" class="form-control" name="pais" placeholder="Digite o pais" value="{{ $cliente->endereco->pais }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <a class="btn btn-danger" href="{{ route('cliente.index') }}">Voltar</a>
                        <input type="submit" class="btn btn-success" value="Atualizar">
                    </div>
                </div>

            </form>
        </div>
    </main>

@endsection

@section('javascript')
    <script>
        $(document).ready( function () {

            $('#cep').on('change', function () {
                var cep = $(this).val();

                var request = $.ajax({
                    method: 'GET',
                    url: '{{ route('cliente.endereco') }}',
                    data: {'cep': cep},
                    dataType:'json'

                });

                request.done(function (e) {
                    // console.log(e);
                    let r = e;
                    try{
                        r= JSON.parse(e);
                    }catch(ex){
                        r = e;
                    }
                    let bairro = r.bairro;
                    let logradouro = r.logradouro;
                    let cidade = r.localidade;
                    let estado = r.uf;

                    $('#bairro').val(bairro);
                    $('#logradouro').val(logradouro);
                    $('#cidade').val(cidade);
                    $('#estado').val(estado);

                });
            })

        } );
    </script>
@endsection