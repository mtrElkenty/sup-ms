<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Frai
 * 
 * @property int $id_frais
 * @property int $frais
 * @property string $libelle_frais
 * @property Carbon $created_at
 * @property int $matieres_evaluationsid_matiere_evaluation
 * @property int $etudiantsid_etudiant
 * @property int $cyclesid_cycle
 * 
 * @property Cycle $cycle
 * @property Collection|PaiementEtudiant[] $paiement_etudiants
 *
 * @package App\Models
 */
class Frai extends Model
{
	protected $table = 'frais';
	protected $primaryKey = 'id_frais';
	public $timestamps = false;

	protected $casts = [
		'frais' => 'int',
		'matieres_evaluationsid_matiere_evaluation' => 'int',
		'etudiantsid_etudiant' => 'int',
		'cyclesid_cycle' => 'int'
	];

	protected $fillable = [
		'frais',
		'libelle_frais',
		'matieres_evaluationsid_matiere_evaluation',
		'etudiantsid_etudiant',
		'cyclesid_cycle'
	];

	public function cycle()
	{
		return $this->belongsTo(Cycle::class, 'cyclesid_cycle');
	}

	public function paiement_etudiants()
	{
		return $this->hasMany(PaiementEtudiant::class, 'frais_id_frais');
	}
}
