@extends('layouts.miPlantilla')

@section('titulo','Ventas')

@section('contenido')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Listado de Ventas</h2>

        <a href="{{ route('ventas.create') }}" class="btn btn-success">
            + Nueva Venta
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($listaVentas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td class="fw-semibold">{{ $venta->producto }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>${{ $venta->precio }}</td>
                        <td class="fw-bold text-success">${{ $venta->total }}</td>

                        <td>

                            <a href="{{ route('ventas.edit', $venta->id) }}"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('ventas.destroy', $venta->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar esta venta?')">
                                    Eliminar
                                </button>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection