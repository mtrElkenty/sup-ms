<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property int $employees_id_employee
 * @property int $roles_id_role
 *
 * @property Employee $employee
 * @property Role $role
 *
 * @package App\Models
 */
class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $casts = [
        'employees_id_employee' => 'int',
        'roles_id_role' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'username',
        'password',
        'employees_id_employee',
        'roles_id_role'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employees_id_employee');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id_role');
    }
}
