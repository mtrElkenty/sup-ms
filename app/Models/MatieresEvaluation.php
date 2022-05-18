<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MatieresEvaluation
 * 
 * @property int $id_matiere_evaluation
 * @property int $matieres_id_matiere
 * @property int $evaluations_id_evaluation
 * @property int $jours_id_jour
 * @property int $horaires_id_horaire
 * @property Carbon|null $created_at
 * 
 * @property Horaire $horaire
 * @property Matiere $matiere
 * @property Evaluation $evaluation
 * @property Jour $jour
 *
 * @package App\Models
 */
class MatieresEvaluation extends Model
{
	protected $table = 'matieres_evaluations';
	protected $primaryKey = 'id_matiere_evaluation';
	public $timestamps = false;

	protected $casts = [
		'matieres_id_matiere' => 'int',
		'evaluations_id_evaluation' => 'int',
		'jours_id_jour' => 'int',
		'horaires_id_horaire' => 'int'
	];

	protected $fillable = [
		'matieres_id_matiere',
		'evaluations_id_evaluation',
		'jours_id_jour',
		'horaires_id_horaire'
	];

	public function horaire()
	{
		return $this->belongsTo(Horaire::class, 'horaires_id_horaire');
	}

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'matieres_id_matiere');
	}

	public function evaluation()
	{
		return $this->belongsTo(Evaluation::class, 'evaluations_id_evaluation');
	}

	public function jour()
	{
		return $this->belongsTo(Jour::class, 'jours_id_jour');
	}
}
