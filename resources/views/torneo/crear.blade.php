@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear torneo</div>

                    <div class="card-body">

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="nombre">Nombre</label>
                                <input value="{{ old('nombre') }}" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre"
                                    aria-describedby="hnombre" placeholder="nombre del torneo">
                                @error('nombre')
                                    <strong id="hnombre" class="form-text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="fecha">Fecha</label>
                                <input value="{{ old('fecha') }}" type="date"
                                    class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha"
                                    aria-describedby="hfecha" placeholder="fecha del torneo">
                                @error('fecha')
                                    <strong id="hfecha" class="form-text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="nivel_id">Niveles</label>
                                <select class="form-select @error('nivel_id') is-invalid @enderror" name="nivel_id"
                                    id="nivel" aria-describedby="hnivel">
                                    @foreach ($niveles as $nivle)
                                        <option {{ old('nivel_id') == $nivle->id ? 'selected' : '' }}
                                            value="{{ $nivle->id }}">
                                            {{ $nivle->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('nivel_id')
                                    <strong id="hnivel" class="form-text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-success" type="submit">Crear torneo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
