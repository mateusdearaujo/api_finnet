@extends('templates.template')

@section('content')
    <div class="container">
        <h1 class="text-center">Usuários Cadastrados na API</h1>
        <table class="table table-bordered text-center">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th style="width: 90px;">Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td><?php echo implode('/', array_reverse(explode('-', $user['birth']))); ?></td>
                <td>
                    <a id="editar" href="/editar?id{{ $user['id'] }}" style="margin-right: 28px">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                        </svg>
                    </a>
                    <a id="excluir" href="">
                        <input type="hidden" name="editar" id="id" value="{{ $user['id'] }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="/cadastrar">Cadastrar novo usuário</a>
    </div>
@endsection
@section('scripts')
    <script>
        $('a[id="excluir"]').on('click', function (event) {
            event.preventDefault();

            let id = $(this).find('input#id').val();

            $.ajax({
                url: "/user/" + id,
                type: "delete",
                data: {
                    'id': id,
                },
                dataType: 'json',
                success: function(response) {
                    if(response['error'] == "") {
                        alert('Usuário deletado');
                        window.location.href = '/';
                    } else {
                        alert(response['error']);
                    }
                }
            });
        });
    </script>
@endsection
