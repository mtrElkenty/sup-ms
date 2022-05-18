<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Presence
 * 
 * @property int $id_presence
 * @property int $present
 * @property Carbon $created_at
 * @property int $etudiants_id_etudiant
 * @property int $seances_id_seance
 * 
 * @property Etudiant $etudiant
 * @property Seance $seance
 *
 * @package App\Models
 */
class Presence extends Model
{
	protected $table = 'presences';
	protected $primaryKey = 'id_presence';
	public $timestamps = false;

	protected $casts = [
		'present' => 'int',
		'etudiants_id_etudiant' => 'int',
		'seances_id_seance' => 'int'
	];

	protected $fillable = [
		'present',
		'etudiants_id_etudiant',
		'seances_id_seance'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'etudiants_id_etudiant');
	}

	public function seance()
	{
		return $this->belongsTo(Seance::class, 'seances_id_seance');
	}
}
