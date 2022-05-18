<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Evaluation
 * 
 * @property int $id_evaluation
 * @property string $type
 * @property string $libelle_evaluation
 * @property Carbon $date_debut
 * @property Carbon $date_fin
 * @property Carbon $created_at
 * @property int $filieres_id_filiere
 * @property int $niveaus_id_niveau
 * @property int $semestresid_semestre
 * 
 * @property Semestre $semestre
 * @property Filiere $filiere
 * @property Niveau $niveau
 * @property Collection|Matiere[] $matieres
 *
 * @package App\Models
 */
class Evaluation extends Model
{
	protected $table = 'evaluations';
	protected $primaryKey = 'id_evaluation';
	public $timestamps = false;

	protected $casts = [
		'filieres_id_filiere' => 'int',
		'niveaus_id_niveau' => 'int',
		'semestresid_semestre' => 'int'
	];

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'type',
		'libelle_evaluation',
		'date_debut',
		'date_fin',
		'filieres_id_filiere',
		'niveaus_id_niveau',
		'semestresid_semestre'
	];

	public function semestre()
	{
		return $this->belongsTo(Semestre::class, 'semestresid_semestre');
	}

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieres_id_filiere');
	}

	public function niveau()
	{
		return $this->belongsTo(Niveau::class, 'niveaus_id_niveau');
	}

	public function matieres()
	{
		return $this->belongsToMany(Matiere::class, 'matieres_evaluations', 'evaluations_id_evaluation', 'matieres_id_matiere')
					->withPivot('id_matiere_evaluation', 'jours_id_jour', 'horaires_id_horaire');
	}
}
