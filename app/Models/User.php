<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property int $employes_id_employe
 * @property int $roles_id_role
 *
 * @property Employe $employe
 * @property Role $role
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $casts = [
        'employes_id_employe' => 'int',
        'roles_id_role' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'username',
        'password',
        'employes_id_employe',
        'roles_id_role'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employes_id_employe');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id_role');
    }
}
