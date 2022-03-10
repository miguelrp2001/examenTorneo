@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Torneos por jugar</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Nivel</th>
                                    <th>Creador</th>
                                    <th>Ult. Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($torneosFuturos as $torneof)
                                    <tr>
                                        <td>{{ $torneof->nombre }}</td>
                                        <td>{{ $torneof->fecha }}</td>
                                        <td>{{ $torneof->nivel->nombre }}</td>
                                        <td>{{ $torneof->creador->name }}</td>
                                        <td>{{ $torneof->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">Torneos jugados</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Nivel</th>
                                    <th>Creador</th>
                                    <th>Ult. Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($torneosPasados as $torneop)
                                    <tr>
                                        <td>{{ $torneop->nombre }}</td>
                                        <td>{{ $torneop->fecha }}</td>
                                        <td>{{ $torneop->nivel->nombre }}</td>
                                        <td>{{ $torneop->creador->name }}</td>
                                        <td>{{ $torneop->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
