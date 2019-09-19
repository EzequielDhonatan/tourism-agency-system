<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserve\Reserve;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function newUser($request)
    {
        $this->name     = $request->name;
        $this->email    = $request->email;
        $this->password = bcrypt($request->password);
        $this->is_admin = $request->is_admin ? true : false;

        return $this->save();
    }

    public function updateUser($request)
    {
        $this->name     = $request->name;
        $this->email    = $request->email;

        // Verifica se atualizou a senha, caso contrário não atualiza como null
        if($request->password && $request->password != '')
            $this->password = bcrypt($request->password);

        $this->is_admin = $request->is_admin ? true : false;

        return $this->save();
    }

    
    public function search($keySearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$keySearch}%")
                        ->orWhere('email', $keySearch)
                        ->paginate($totalPage);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
