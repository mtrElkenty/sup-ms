<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnneesScolaire
 * 
 * @property int $id_annee_scolaire
 * @property Carbon|null $created_at
 * 
 * @property Collection|Note[] $notes
 *
 * @package App\Models
 */
class AnneesScolaire extends Model
{
	protected $table = 'annees_scolaires';
	protected $primaryKey = 'id_annee_scolaire';
	public $timestamps = false;

	public function notes()
	{
		return $this->hasMany(Note::class, 'annees_scolaires_id_annee_scolaire');
	}
}
