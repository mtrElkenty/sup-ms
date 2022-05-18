<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 * 
 * @property string $libelle_module
 * @property int $id_modules
 * @property Carbon $created_at
 * @property string $code_module
 * @property int $filieresid_filiere
 * @property int $semestresid_semestre
 * 
 * @property Semestre $semestre
 * @property Filiere $filiere
 * @property Collection|Matiere[] $matieres
 *
 * @package App\Models
 */
class Module extends Model
{
	protected $table = 'modules';
	protected $primaryKey = 'id_modules';
	public $timestamps = false;

	protected $casts = [
		'filieresid_filiere' => 'int',
		'semestresid_semestre' => 'int'
	];

	protected $fillable = [
		'libelle_module',
		'code_module',
		'filieresid_filiere',
		'semestresid_semestre'
	];

	public function semestre()
	{
		return $this->belongsTo(Semestre::class, 'semestresid_semestre');
	}

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieresid_filiere');
	}

	public function matieres()
	{
		return $this->hasMany(Matiere::class, 'modules_id_modules');
	}
}
