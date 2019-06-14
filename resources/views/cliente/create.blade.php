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
                    <h1 class="text-center">Cadastro de Cliente</h1>
                </div>
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <l1>{{ $error }}</l1><br>
                @endforeach
            @endif

            <form action="{{ route('cliente.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for=""><b>Nome :</b></label>
                        <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for=""><b>E-mail :</b></label>
                        <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Telefone :</b></label>
                        <input type="text" class="form-control" name="telefone" placeholder="Digite seu telefone">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for=""><b>Sexo :</b></label>
                        <select class="form-control" name="sexo" id="">
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                            <option value="3">Não especificado</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Nascimento :</b></label>
                        <input type="date" class="form-control" name="nascimento">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for=""><b>Cep :</b></label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite a cep">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Logradouro :</b></label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Digite o logradouro">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for=""><b>Numero :</b></label>
                        <input type="text" class="form-control" name="numero" placeholder="Digite o número">
                    </div>

                    <div class="form-group col-md-3">
                        <label for=""><b>Bairro :</b></label>
                        <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Digite o bairro">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Cidade :</b></label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade">
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for=""><b>Complemento :</b></label>
                        <input type="text" class="form-control" name="complemento" placeholder="Digite o complemento">
                    </div>

                    <div class="form-group col-md-3">
                        <label for=""><b>Estado :</b></label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado">
                    </div>

                    <div class="form-group col-md-3">
                        <label for=""><b>País :</b></label>
                        <input type="text" class="form-control" name="pais" placeholder="Digite o pais">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <a class="btn btn-danger" href="{{ route('cliente.index') }}">Voltar</a>
                        <input type="submit" class="btn btn-success" value="Cadastrar">
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