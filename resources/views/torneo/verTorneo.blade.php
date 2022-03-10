@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Participantes de {{ $torneoE->nombre }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Ult. Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jugadores as $jugador)
                                    <tr>
                                        <td>{{ $jugador->name }}</td>
                                        <td>{{ $jugador->email }}</td>
                                        <td>{{ $jugador->updated_at }}</td>
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
