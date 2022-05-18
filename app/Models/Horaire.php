<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horaire
 * 
 * @property int $id_horaire
 * @property Carbon $du
 * @property Carbon $a
 * @property Carbon $created_at
 * 
 * @property Collection|MatieresEvaluation[] $matieres_evaluations
 * @property Collection|Seance[] $seances
 *
 * @package App\Models
 */
class Horaire extends Model
{
	protected $table = 'horaires';
	protected $primaryKey = 'id_horaire';
	public $timestamps = false;

	protected $dates = [
		'du',
		'a'
	];

	protected $fillable = [
		'du',
		'a'
	];

	public function matieres_evaluations()
	{
		return $this->hasMany(MatieresEvaluation::class, 'horaires_id_horaire');
	}

	public function seances()
	{
		return $this->hasMany(Seance::class, 'horaires_id_horaire');
	}
}
