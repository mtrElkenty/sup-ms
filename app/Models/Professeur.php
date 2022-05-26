<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Professeur
 *
 * @property int $id_professeur
 * @property Carbon|null $created_at
 * @property int $employes_id_employe
 *
 * @property Employe $employe
 * @property Collection|HeuresEffectuee[] $heures_effectuees
 * @property Collection|MatieresPofesseur[] $matieres_pofesseurs
 * @property Collection|Seance[] $seances
 *
 * @package App\Models
 */
class Professeur extends Model
{
	protected $table = 'professeurs';
	protected $primaryKey = 'id_professeur';
	public $timestamps = false;

	protected $casts = [
		'employes_id_employe' => 'int'
	];

	protected $fillable = [
		'employes_id_employe'
	];

	public function employe()
	{
		return $this->belongsTo(Employe::class, 'employes_id_employe');
	}

	public function heures_effectuees()
	{
		return $this->hasMany(HeuresEffectuee::class, 'professeurs_id_professeur');
	}

	public function matieres_pofesseurs()
	{
		return $this->hasMany(MatieresPofesseur::class, 'professeurs_id_professeur');
	}

	public function seances()
	{
		return $this->hasMany(Seance::class, 'professeurs_id_professeur');
	}
}
