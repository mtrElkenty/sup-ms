<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Filiere
 * 
 * @property int $id_filiere
 * @property string $code_filiere
 * @property string $libelle_filiere
 * @property Carbon $created_at
 * @property int $cycles_id_cycle
 * 
 * @property Cycle $cycle
 * @property Collection|Avis[] $avis
 * @property Collection|Etudiant[] $etudiants
 * @property Collection|Evaluation[] $evaluations
 * @property Collection|Module[] $modules
 * @property Collection|Seance[] $seances
 *
 * @package App\Models
 */
class Filiere extends Model
{
	protected $table = 'filieres';
	protected $primaryKey = 'id_filiere';
	public $timestamps = false;

	protected $casts = [
		'cycles_id_cycle' => 'int'
	];

	protected $fillable = [
		'code_filiere',
		'libelle_filiere',
		'cycles_id_cycle'
	];

	public function cycle()
	{
		return $this->belongsTo(Cycle::class, 'cycles_id_cycle');
	}

	public function avis()
	{
		return $this->hasMany(Avis::class, 'filieres_id_filiere');
	}

	public function etudiants()
	{
		return $this->hasMany(Etudiant::class, 'filieres_id_filiere');
	}

	public function evaluations()
	{
		return $this->hasMany(Evaluation::class, 'filieres_id_filiere');
	}

	public function modules()
	{
		return $this->hasMany(Module::class, 'filieres_id_filiere');
	}

	public function seances()
	{
		return $this->hasMany(Seance::class, 'filieres_id_filiere');
	}
}
