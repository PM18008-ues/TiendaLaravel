<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container"><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{ route('products.create')}}" class="btn btn-success btn-sm float-end">Nuevo Producto</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success">
                                {{session('info')}}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{$product->description}}
                                        </td>
                                        <td>
                                            {{$product->price}}
                                        </td>
                                        <td>
                                            <a href="javascript:" class="btn btn-danger">Eliminar</a>
                                            <form id="delete-{{$product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>