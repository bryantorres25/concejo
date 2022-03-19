<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Authenticatable
{
    use Notifiable;
    
    protected $table="usuarios";
    protected $primaryKey="id";

    protected $fillable = [
        'email', 'password', 'persona_id','estado','is_admin'
    ];

    public function getId()
{
     return $this->persona_id;
}
}