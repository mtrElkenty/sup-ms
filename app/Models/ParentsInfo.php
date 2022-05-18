<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ParentsInfo
 * 
 * @property int $id_parent
 * @property Carbon|null $created_at
 * 
 * @property Collection|Etudiant[] $etudiants
 *
 * @package App\Models
 */
class ParentsInfo extends Model
{
	protected $table = 'parents_infos';
	protected $primaryKey = 'id_parent';
	public $timestamps = false;

	public function etudiants()
	{
		return $this->hasMany(Etudiant::class, 'parents_infos_id_parent');
	}
}
