<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etudiant
 * 
 * @property int $id_etudiant
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property string $NNI
 * @property string $telephone
 * @property string|null $email
 * @property string $adress
 * @property string $ville
 * @property string $pays
 * @property string $sexe
 * @property Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $situation_famille
 * @property Carbon $created_at
 * @property int $parents_infos_id_parent
 * @property int $niveaux_id_niveau
 * @property int $filieres_id_filiere
 * 
 * @property Filiere $filiere
 * @property ParentsInfo $parents_info
 * @property Niveau $niveau
 * @property Collection|Note[] $notes
 * @property Collection|PaiementEtudiant[] $paiement_etudiants
 * @property Collection|Presence[] $presences
 * @property Collection|SessionsRattrapage[] $sessions_rattrapages
 *
 * @package App\Models
 */
class Etudiant extends Model
{
	protected $table = 'etudiants';
	protected $primaryKey = 'id_etudiant';
	public $timestamps = false;

	protected $casts = [
		'parents_infos_id_parent' => 'int',
		'niveaux_id_niveau' => 'int',
		'filieres_id_filiere' => 'int'
	];

	protected $dates = [
		'date_naissance'
	];

	protected $fillable = [
		'matricule',
		'nom',
		'prenom',
		'NNI',
		'telephone',
		'email',
		'adress',
		'ville',
		'pays',
		'sexe',
		'date_naissance',
		'lieu_naissance',
		'situation_famille',
		'parents_infos_id_parent',
		'niveaux_id_niveau',
		'filieres_id_filiere'
	];

	public function filiere()
	{
		return $this->belongsTo(Filiere::class, 'filieres_id_filiere');
	}

	public function parents_info()
	{
		return $this->belongsTo(ParentsInfo::class, 'parents_infos_id_parent');
	}

	public function niveau()
	{
		return $this->belongsTo(Niveau::class, 'niveaux_id_niveau');
	}

	public function notes()
	{
		return $this->hasMany(Note::class, 'etudiants_id_etudiant');
	}

	public function paiement_etudiants()
	{
		return $this->hasMany(PaiementEtudiant::class, 'etudiants_id_etudiant');
	}

	public function presences()
	{
		return $this->hasMany(Presence::class, 'etudiants_id_etudiant');
	}

	public function sessions_rattrapages()
	{
		return $this->hasMany(SessionsRattrapage::class, 'etudiants_id_etudiant');
	}
}
