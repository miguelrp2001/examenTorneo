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
        return $this->belongsTo(Nivel_torneo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}