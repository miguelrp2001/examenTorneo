@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Torneos creados futuros</div>

                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="torneo">Torneo</label>
                                <select class="form-control" name="torneo" id="torneo">
                                    @foreach ($torneos as $torneo)
                                        <option value="{{ $torneo->id }}">{{ $torneo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('torneo')
                                    <strong id="htorneo" class="form-text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Inscribirse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
