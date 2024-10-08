<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap</title>
    <!--Link do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


<body>
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if (session('mensagem'))
                <div class="alert alert-success" role="alert">
                    {{ session('mensagem') }}
                </div>
            @endif
            @if (session('erro'))
                <div class="alert alert-danger" role="alert">
                    {{ session('erro') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar">
                        Cadastrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrando Produtos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">Descrição</span>
                                            <input type="text" class="form-control" placeholder="Digite a descrição"
                                                name="description" aria-label="Username"
                                                aria-describedby="addon-wrapping">
                                        </div>

                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">Quantidade</span>
                                            <input type="text" class="form-control" placeholder="Digite a quantidade"
                                                name="quantity" aria-label="Username" aria-describedby="addon-wrapping">
                                        </div>

                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">
                                                Preço</span>
                                            <input type="text" class="form-control" placeholder="Digite o preço"
                                                name="value" aria-label="Username" aria-describedby="addon-wrapping">
                                        </div>

                                        <select class="form-select" name="product_types_id">
                                            <option value="">Selecione um tipo de produto</option>
                                            @foreach ($productsTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descricao</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Tipo De Produto</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->value }}</td>
                                        <td>{{ $product->type->name }}</td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editar{{ $product->id }}">
                                                Editar
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="editar{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('products.update', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Editando Produtos</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text"
                                                                        id="addon-wrapping">Descrição</span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Digite a descrição"
                                                                        value="{{ $product->description }}"
                                                                        name="description" aria-label="Username"
                                                                        aria-describedby="addon-wrapping">
                                                                </div>

                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text"
                                                                        id="addon-wrapping">Quantidade</span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Digite a quantidade"
                                                                        value="{{ $product->quantity }}"
                                                                        name="quantity" aria-label="Username"
                                                                        aria-describedby="addon-wrapping">
                                                                </div>

                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text"
                                                                        id="addon-wrapping">Preço</span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Digite o preço"
                                                                        value="{{ $product->value }}" name="value"
                                                                        aria-label="Username"
                                                                        aria-describedby="addon-wrapping">
                                                                </div>

                                                                <select class="form-select" name="product_types_id">
                                                                    <option hidden
                                                                        value="{{ $product->product_types_id }}">
                                                                        {{ $product->type->name }}</option>
                                                                    @foreach ($productsTypes as $type)
                                                                        <option value="{{ $type->id }}">
                                                                            {{ $type->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Salvar</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deletar{{ $product->id }}">
                                                Deletar
                                            </button>

                                            <div class="modal fade" id="deletar{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Deletando Produtos</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6 style="text-align: center">Deseja deletar esse
                                                                    produto
                                                                    ?<h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Salvar</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                         </div>
                                        </div>
                                   </tr>
                                @endforeach
                         </tbody>
                     </table>
                    </div>
                </div>
         <div class="col-md-2"></div>
     </div>
 </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
