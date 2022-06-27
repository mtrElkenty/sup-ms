<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ParentsInfo
 *
 * @property int $id_parent
 * @property string $nom_pere
 * @property string $prenom_pere
 * @property string $nom_mere
 * @property string $prenom_mere
 * @property string $contact
 * @property Carbon|null $created_at
 *
 * @property Collection|Etudiant[] $etudiants
 *
 * @package App\Models
 * @method static create(array $new_parent)
 */
class ParentsInfo extends Model
{
	protected $table = 'parents_infos';
	protected $primaryKey = 'id_parent';
	public $timestamps = false;

    protected $fillable = [
        'nom_pere',
        'prenom_pere',
        'nom_mere',
        'prenom_mere',
        'contact'
    ];

	public function etudiants(): HasMany
    {
		return $this->hasMany(Etudiant::class, 'parents_infos_id_parent');
	}
}
