<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Semestre
 * 
 * @property int $id_semestre
 * @property string $libelle_semestre
 * @property Carbon|null $created_at
 * @property int $niveaus_id_niveau
 * 
 * @property Niveau $niveau
 * @property Collection|Evaluation[] $evaluations
 * @property Collection|Module[] $modules
 * @property Collection|Note[] $notes
 *
 * @package App\Models
 */
class Semestre extends Model
{
	protected $table = 'semestres';
	protected $primaryKey = 'id_semestre';
	public $timestamps = false;

	protected $casts = [
		'niveaus_id_niveau' => 'int'
	];

	protected $fillable = [
		'libelle_semestre',
		'niveaus_id_niveau'
	];

	public function niveau()
	{
		return $this->belongsTo(Niveau::class, 'niveaus_id_niveau');
	}

	public function evaluations()
	{
		return $this->hasMany(Evaluation::class, 'semestresid_semestre');
	}

	public function modules()
	{
		return $this->hasMany(Module::class, 'semestresid_semestre');
	}

	public function notes()
	{
		return $this->hasMany(Note::class, 'semestres_id_semestre');
	}
}
