@extends('index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Analisis Nutricional</h3>
                    <a href="{{route('analisis_nutricional.create')}}">
                        <button type="button" class="btn btn-add btn-sm float-right">
                            Nuevo Analisis
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover data-info">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div>


    @endsection
