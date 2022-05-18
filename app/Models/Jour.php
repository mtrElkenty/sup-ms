<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jour
 * 
 * @property int $id_jour
 * @property string $jour
 * @property Carbon $created_at
 * 
 * @property Collection|MatieresEvaluation[] $matieres_evaluations
 * @property Collection|Seance[] $seances
 *
 * @package App\Models
 */
class Jour extends Model
{
	protected $table = 'jours';
	protected $primaryKey = 'id_jour';
	public $timestamps = false;

	protected $fillable = [
		'jour'
	];

	public function matieres_evaluations()
	{
		return $this->hasMany(MatieresEvaluation::class, 'jours_id_jour');
	}

	public function seances()
	{
		return $this->hasMany(Seance::class, 'jours_id_jour');
	}
}
