<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
   use HasFactory;

   protected $primaryKey = 'userid';
   public $incrementing = true;
    protected $keyType = 'int';
   public $timestamps = false;
   protected $fillable = [
       'login',
       'password',
       'role'
   ];

   protected static function booted()
   {
       static::created(function ($user) {
           $user->password = md5($user->password);
           $user->save();
       });
   }

      public function findIdentity(int $id)
   {
       return self::where('userid', $id)->first();
   }

   public function getId(): int
   {
       return $this->userid;
   }

   public function attemptIdentity(array $credentials)
   {
       return self::where(['login' => $credentials['login'],
           'password' => md5($credentials['password'])])->first();
   }
}
