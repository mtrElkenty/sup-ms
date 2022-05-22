<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Frais
 * 
 * @property int $id_frais
 * @property int $frais
 * @property string $libelle_frais
 * @property Carbon $created_at
 * @property int $matieres_evaluations_id_matiere_evaluation
 * @property int $etudiants_id_etudiant
 * @property int $cycles_id_cycle
 * 
 * @property Cycle $cycle
 * @property Collection|PaiementEtudiant[] $paiement_etudiants
 *
 * @package App\Models
 */
class Frais extends Model
{
    protected $table = 'frais';
    protected $primaryKey = 'id_frais';
    public $timestamps = false;

    protected $casts = [
        'frais' => 'int',
        'matieres_evaluations_id_matiere_evaluation' => 'int',
        'etudiants_id_etudiant' => 'int',
        'cycles_id_cycle' => 'int'
    ];

    protected $fillable = [
        'frais',
        'libelle_frais',
        'matieres_evaluations_id_matiere_evaluation',
        'etudiants_id_etudiant',
        'cycles_id_cycle'
    ];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycles_id_cycle');
    }

    public function paiement_etudiants()
    {
        return $this->hasMany(PaiementEtudiant::class, 'frais_id_frais');
    }
}
