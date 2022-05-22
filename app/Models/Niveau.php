<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Niveau
 * 
 * @property int $id_niveau
 * @property string $libelle_niveau
 * @property Carbon|null $created_at
 * @property int $cycles_id_cycle
 * 
 * @property Cycle $cycle
 * @property Collection|Avis[] $avis
 * @property Collection|Etudiant[] $etudiants
 * @property Collection|Evaluation[] $evaluations
 * @property Collection|Seance[] $seances
 * @property Collection|Semestre[] $semestres
 *
 * @package App\Models
 */
class Niveau extends Model
{
    protected $table = 'niveaux';
    protected $primaryKey = 'id_niveau';
    public $timestamps = false;

    protected $casts = [
        'cycles_id_cycle' => 'int'
    ];

    protected $fillable = [
        'libelle_niveau',
        'cycles_id_cycle'
    ];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycles_id_cycle');
    }

    public function avis()
    {
        return $this->hasMany(Avis::class, 'niveauxid_niveau');
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'niveaux_id_niveau');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'niveaux_id_niveau');
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, 'niveaux_id_niveau');
    }

    public function semestres()
    {
        return $this->hasMany(Semestre::class, 'niveaux_id_niveau');
    }
}
