<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $fillable = [
        'vehicule_id',
        'nature_intervention',
        'fait_generateur',
        'detail_fait_generateur',
    ];
    public function vehicule()
{
    return $this->belongsTo(Vehicule::class);
}

}
