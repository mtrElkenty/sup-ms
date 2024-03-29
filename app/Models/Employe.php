<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Employe
 *
 * @property int $id_employe
 * @property string $nom
 * @property string $prenom
 * @property string $NNI
 * @property string $telephone_1
 * @property string|null $telephone_2
 * @property string|null $email
 * @property string $adress
 * @property string $ville
 * @property string $pays
 * @property string $sexe
 * @property Carbon $date_naissance
 * @property string $lieu_naissance
 * @property Carbon $created_at
 * @property int $fonctions_id_fonction
 *
 * @property Fonction $fonction
 * @property Collection|Avis[] $avis
 * @property Collection|Professeur[] $professeurs
 * @property Collection|User[] $users
 *
 * @package App\Models
 * @method static create(array $new_employe)
 * @method static join(string $table, string $on1, string $operation, string $on2)
 */
class Employe extends Model
{
    protected $table = 'employes';
    protected $primaryKey = 'id_employe';
    public $timestamps = false;

    protected $casts = [
        'fonctions_id_fonction' => 'int'
    ];

    protected $dates = [
        'date_naissance'
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'NNI',
        'telephone_1',
        'telephone_2',
        'email',
        'adress',
        'ville',
        'pays',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'fonctions_id_fonction'
    ];

    public function getFonction(): Collection
    {
        return Fonction::all()->where('id_fonction', '=', $this->fonctions_id_fonction);
    }

    public function fonction(): BelongsTo
    {
        return $this->belongsTo(Fonction::class, 'fonctions_id_fonction');
    }

    public function avis(): HasMany
    {
        return $this->hasMany(Avis::class, 'employes_id_employe');
    }

    public function professeurs(): HasMany
    {
        return $this->hasMany(Professeur::class, 'employes_id_employe');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'employes_id_employe');
    }
}
