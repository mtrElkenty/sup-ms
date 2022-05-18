<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MatieresPofesseur
 * 
 * @property int $id_matiere_pofesseur
 * @property int $matieres_id_matiere
 * @property int $professeurs_id_professeur
 * @property Carbon $created_at
 * 
 * @property Matiere $matiere
 * @property Professeur $professeur
 *
 * @package App\Models
 */
class MatieresPofesseur extends Model
{
	protected $table = 'matieres_pofesseurs';
	protected $primaryKey = 'id_matiere_pofesseur';
	public $timestamps = false;

	protected $casts = [
		'matieres_id_matiere' => 'int',
		'professeurs_id_professeur' => 'int'
	];

	protected $fillable = [
		'matieres_id_matiere',
		'professeurs_id_professeur'
	];

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'matieres_id_matiere');
	}

	public function professeur()
	{
		return $this->belongsTo(Professeur::class, 'professeurs_id_professeur');
	}
}
