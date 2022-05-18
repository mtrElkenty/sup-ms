<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seance
 * 
 * @property int $id_seance
 * @property int $seance_rattrapage
 * @property Carbon $created_at
 * @property int $horaires_id_horaire
 * @property int $jours_id_jour
 * @property int $professeurs_id_professeur
 * @property int $niveaus_id_niveau
 * @property int $filieres_id_filiere
 * @property int $matieres_id_matiere
 * 
 * @property Professeur $professeur
 * @property Horaire $horaire
 * @property Filiere $filiere
 * @property Niveau $niveau
 * @property Jour $jour
 * @property Matiere $matiere
 * @property Collection|Presence[] $presences
 *
 * @package App\Models
 */
class Seance extends Model
{
	protected $table = 'seances';
	protected $primaryKey = 'id_seance';
	public $timestamps = false;

	protected $casts = [
		'seance_rattrapage' => 'int',
		'horaires_id_horaire' => 'int',
		'jours_id_jour' => 'int',
		'professeurs_id_professeur' => 'int',
		'niveaus_id_niveau' => 'int',
		'filieres_id_filiere' => 'int',
		'matieres_id_matiere' => 'int'
	];

	protected $fillable = [
		'seance_rattrapage',
		'horaires_id_horaire',
		'jours_id_jour',
		'professeurs_id_professeur',
		'niveaus_id_niveau',
		'filieres_id_filiere',
		'matieres_id_matiere'
	];

	public function professeur()
	{
		return $this->belongsTo(Professeur::class, 'professeurs_id_professeur');
	}

	public function horaire()
	{
		return $this->belongsTo(Horaire::class, 'horaires_id_horaire');
	}

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieres_id_filiere');
	}

	public function niveau()
	{
		return $this->belongsTo(Niveau::class, 'niveaus_id_niveau');
	}

	public function jour()
	{
		return $this->belongsTo(Jour::class, 'jours_id_jour');
	}

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'matieres_id_matiere');
	}

	public function presences()
	{
		return $this->hasMany(Presence::class, 'seances_id_seance');
	}
}
