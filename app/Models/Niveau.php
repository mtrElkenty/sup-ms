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
 * @property int $cyclesid_cycle
 * 
 * @property Cycle $cycle
 * @property Collection|Avi[] $avis
 * @property Collection|Etudiant[] $etudiants
 * @property Collection|Evaluation[] $evaluations
 * @property Collection|Seance[] $seances
 * @property Collection|Semestre[] $semestres
 *
 * @package App\Models
 */
class Niveau extends Model
{
	protected $table = 'niveaus';
	protected $primaryKey = 'id_niveau';
	public $timestamps = false;

	protected $casts = [
		'cyclesid_cycle' => 'int'
	];

	protected $fillable = [
		'libelle_niveau',
		'cyclesid_cycle'
	];

	public function cycle()
	{
		return $this->belongsTo(Cycle::class, 'cyclesid_cycle');
	}

	public function avis()
	{
		return $this->hasMany(Avi::class, 'niveausid_niveau');
	}

	public function etudiants()
	{
		return $this->hasMany(Etudiant::class, 'niveaus_id_niveau');
	}

	public function evaluations()
	{
		return $this->hasMany(Evaluation::class, 'niveaus_id_niveau');
	}

	public function seances()
	{
		return $this->hasMany(Seance::class, 'niveaus_id_niveau');
	}

	public function semestres()
	{
		return $this->hasMany(Semestre::class, 'niveaus_id_niveau');
	}
}
