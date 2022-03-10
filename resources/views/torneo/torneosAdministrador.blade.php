@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header">Torneos creados futuros</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Nivel</th>
                                    <th>Creador</th>
                                    <th>Ult. Actualización</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($torneos as $torneo)
                                    <tr>
                                        <td>{{ $torneo->nombre }}</td>
                                        <td>{{ $torneo->fecha }}</td>
                                        <td>{{ $torneo->nivel->nombre }}</td>
                                        <td>{{ $torneo->creador->name }}</td>
                                        <td>{{ $torneo->updated_at }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('vertorneo', $torneo->id) }}"
                                                    class="btn btn-warning">Participantes</a>
                                                <form action="{{ route('deletetorneo', $torneo->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                </form>
                                            </div>
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
@endsection
