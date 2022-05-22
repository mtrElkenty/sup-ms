<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HeuresEffectuee
 * 
 * @property int $id_heure_effectuee
 * @property Carbon $created_at
 * @property int $professeurs_id_professeur
 * 
 * @property Professeur $professeur
 *
 * @package App\Models
 */
class HeuresEffectuee extends Model
{
	protected $table = 'heures_effectuees';
	protected $primaryKey = 'id_heure_effectuee';
	public $timestamps = false;

	protected $casts = [
		'professeurs_id_professeur' => 'int'
	];

	protected $fillable = [
		'professeurs_id_professeur'
	];

	public function professeur()
	{
		return $this->belongsTo(Professeur::class, 'professeurs_id_professeur');
	}
}
