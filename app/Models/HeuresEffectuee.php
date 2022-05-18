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
 * @property int $professeursid_professeur
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
		'professeursid_professeur' => 'int'
	];

	protected $fillable = [
		'professeursid_professeur'
	];

	public function professeur()
	{
		return $this->belongsTo(Professeur::class, 'professeursid_professeur');
	}
}
