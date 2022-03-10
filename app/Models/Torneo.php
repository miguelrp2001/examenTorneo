<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha',
        'nivel_id'
    ];

    public function nivel()
    {
        return $this->belongsTo(NivelTorneo::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}