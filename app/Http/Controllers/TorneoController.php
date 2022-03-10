<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscripcionRequest;
use App\Http\Requests\TorneoRequest;
use App\Models\NivelTorneo;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TorneoController extends Controller
{
    public function crearTorneo()
    {
        $niveles = NivelTorneo::All();
        return view('torneo.crear', compact('niveles'));
    }

    public function altaTorneo(TorneoRequest $request)
    {
        $torneo = new Torneo($request->input());
        $torneo->creador_id = Auth::user()->id;

        $torneo->save();

        return redirect(route('creartorneo'))->with('exito', 'Se ha creado el torneo: ' . $torneo->nombre . '.');
    }

    public function torneosCreador()
    {
        $torneosFuturos = Auth::user()->torneosCreados->where('fecha', '>=', now());
        $torneosPasados = Auth::user()->torneosCreados->where('fecha', '<', now());

        return view('torneo.torneosCreador', compact('torneosFuturos', 'torneosPasados'));
    }

    public function inscrTorneos()
    {
        $torneos = Torneo::all()->where('fecha', '>=', now());
        return view('torneo.inscripcion', compact('torneos'));
    }

    public function inscripcionTorneo(InscripcionRequest $request)
    {
        $torneo = Torneo::findOrFail($request->torneo);

        if ($torneo->users->find(Auth::user()->id)) {
            return redirect(route('insctorneo'))->with('error', 'Ya estaba inscrito a ' . $torneo->nombre . '.');
        } else {
            $torneo->users()->attach(Auth::user());
            return redirect(route('insctorneo'))->with('exito', 'Se ha inscrito a ' . $torneo->nombre . '.');
        }
    }

    public function torneosJugador()
    {
        $torneosFuturos = Auth::user()->torneos->where('fecha', '>=', now());
        $torneosPasados = Auth::user()->torneos->where('fecha', '<', now());

        return view('torneo.torneosJugador', compact('torneosFuturos', 'torneosPasados'));
    }

    public function torneosAdministrador()
    {
        $torneos = Torneo::all();

        return view('torneo.torneosAdministrador', compact('torneos'));
    }

    public function deleteTorneo($torneo)
    {
        $torenoBorrar = Torneo::findOrFail($torneo);
        $torenoBorrar->delete();

        return redirect(route('torneosadministrador'))->with('exito', 'Se ha eliminado el torneo ' . $torenoBorrar->nombre . '.');
    }

    public function verTorneo($torneo)
    {
        $torneoE = Torneo::findOrFail($torneo);
        $jugadores = $torneoE->users;

        return view('torneo.verTorneo', compact('torneoE', 'jugadores'));
    }
}
