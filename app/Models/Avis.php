<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Avis
 *
 * @property int $id_avis
 * @property string|null $titre_avis
 * @property string|null $description_avis
 * @property Carbon $created_at
 * @property int $employes_id_employe
 * @property int $filieres_id_filiere
 * @property int $niveaux_id_niveau
 *
 * @property Niveau $niveau
 * @property Employe $employe
 * @property Filiere $filiere
 *
 * @package App\Models
 */
class Avis extends Model
{
    protected $table = 'avis';
    protected $primaryKey = 'id_avis';
    public $timestamps = false;

    protected $casts = [
        'employes_id_employe' => 'int',
        'filieres_id_filiere' => 'int',
        'niveaux_id_niveau' => 'int'
    ];

    protected $fillable = [
        'titre_avis',
        'description_avis',
        'employes_id_employe',
        'filieres_id_filiere',
        'niveaux_id_niveau'
    ];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'niveaux_id_niveau');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employes_id_employe');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filieres_id_filiere');
    }
}
