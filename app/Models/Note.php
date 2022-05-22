<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 * 
 * @property int $id_note
 * @property float|null $cc
 * @property float|null $cp
 * @property float|null $moyenne_generale
 * @property float|null $cp_rattrapage
 * @property Carbon|null $created_at
 * @property int $semestres_id_semestre
 * @property int $etudiants_id_etudiant
 * @property int $matieres_id_matiere
 * @property int $annees_scolaires_id_annee_scolaire
 * 
 * @property Matiere $matiere
 * @property AnneesScolaire $annees_scolaire
 * @property Etudiant $etudiant
 * @property Semestre $semestre
 *
 * @package App\Models
 */
class Note extends Model
{
	protected $table = 'notes';
	protected $primaryKey = 'id_note';
	public $timestamps = false;

	protected $casts = [
		'cc' => 'float',
		'cp' => 'float',
		'moyenne_generale' => 'float',
		'cp_rattrapage' => 'float',
		'semestres_id_semestre' => 'int',
		'etudiants_id_etudiant' => 'int',
		'matieres_id_matiere' => 'int',
		'annees_scolaires_id_annee_scolaire' => 'int'
	];

	protected $fillable = [
		'cc',
		'cp',
		'moyenne_generale',
		'cp_rattrapage',
		'semestres_id_semestre',
		'etudiants_id_etudiant',
		'matieres_id_matiere',
		'annees_scolaires_id_annee_scolaire'
	];

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'matieres_id_matiere');
	}

	public function annees_scolaire()
	{
		return $this->belongsTo(AnneesScolaire::class, 'annees_scolaires_id_annee_scolaire');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'etudiants_id_etudiant');
	}

	public function semestre()
	{
		return $this->belongsTo(Semestre::class, 'semestres_id_semestre');
	}
}
