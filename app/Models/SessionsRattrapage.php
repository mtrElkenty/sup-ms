<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionsRattrapage
 * 
 * @property int $id_session_rattrapage
 * @property Carbon $created_at
 * @property int $matieres_id_matiere
 * @property int $etudiants_id_etudiant
 * 
 * @property Matiere $matiere
 * @property Etudiant $etudiant
 *
 * @package App\Models
 */
class SessionsRattrapage extends Model
{
	protected $table = 'sessions_rattrapages';
	protected $primaryKey = 'id_session_rattrapage';
	public $timestamps = false;

	protected $casts = [
		'matieres_id_matiere' => 'int',
		'etudiants_id_etudiant' => 'int'
	];

	protected $fillable = [
		'matieres_id_matiere',
		'etudiants_id_etudiant'
	];

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'matieres_id_matiere');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'etudiants_id_etudiant');
	}
}
