@extends('templates.template')

@section('content')

    <div class="container">
        <h1 class="text-center">Editar usuário</h1>
        <form name="formEdit">
            <div class="form-group">
                <label for="nome">Nome do usuário</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite o Nome">
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="text" class="form-control" id="data_nascimento" placeholder="Data">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a class="btn btn-primary" href="/" style="float: right;">Retornar</a>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('form[name="formEdit"]').submit(function(event) {
                event.preventDefault();

                var url = window.location.href.split('?id');
                var id = url[1];

                let nome = $(this).find('input#nome').val();
                let data_nascimento = $(this).find('input#data_nascimento').val();

                $.ajax({
                    url: "/user",
                    type: "put",
                    headers: {
                        "id": id,
                    },
                    data: {
                        'nome' : nome,
                        'data_nascimento' : data_nascimento
                    },
                    dataType: 'json',
                    success: function(response) {
                        if(response['error'] == "") {
                            alert('Usuário atualizado');
                            window.location.href = '/';
                        } else {
                            alert(response['error']);
                        }
                    }
                });
            });
        });
    </script>
@endsection
