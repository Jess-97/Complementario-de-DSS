@extends('layouts.miPlantilla')

@section('titulo','Crear Venta')

@section('contenido')

<div class="container">

    <div class="card shadow">
        <div class="card-body">

            <h3 class="mb-4">Nueva Venta</h3>

            <form action="{{ route('ventas.store') }}" method="POST">
                @csrf

                <label class="form-label">Producto</label>
                <input type="text" name="producto" class="form-control mb-3" placeholder="Ingrese producto">

                <label class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control mb-3" placeholder="Ingrese cantidad">

                <label class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control mb-3" placeholder="Ingrese precio">

                <label class="form-label">Total</label>
                <input type="text" name="total" class="form-control mb-3" placeholder="Ingrese total">

                <button class="btn btn-success w-100">
                    Guardar Venta
                </button>

            </form>

        </div>
    </div>

</div>

@endsection