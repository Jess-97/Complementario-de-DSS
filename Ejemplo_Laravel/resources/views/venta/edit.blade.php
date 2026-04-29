@extends('layouts.miPlantilla')

@section('titulo','Editar Venta')

@section('contenido')

<div class="container">

    <div class="card shadow">
        <div class="card-body">

            <h3 class="mb-4">Editar Venta</h3>

            <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="form-label">Producto</label>
                <input type="text" name="producto" value="{{ $venta->producto }}" class="form-control mb-3">

                <label class="form-label">Cantidad</label>
                <input type="number" name="cantidad" value="{{ $venta->cantidad }}" class="form-control mb-3">

                <label class="form-label">Precio</label>
                <input type="text" name="precio" value="{{ $venta->precio }}" class="form-control mb-3">

                <label class="form-label">Total</label>
                <input type="text" name="total" value="{{ $venta->total }}" class="form-control mb-3">

                <button class="btn btn-primary w-100">
                    Actualizar Venta
                </button>

            </form>

        </div>
    </div>

</div>

@endsection