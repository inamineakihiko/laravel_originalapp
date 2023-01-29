<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Mail\ResetPassword; // ★ 追加
use Illuminate\Support\Facades\Mail; // ★ 追加
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function register()
    {
        return $this->hasMany('App\Models\Register');
    }

    public function product() {
        return $this->hasMany('App\Models\Product');
    }

    public function favorite() {
        return $this->hasMany('App\Models\favorite');
    }

    public function contact()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

       /**
     * ★ パスワード再設定メールを送信する
     */
    /**
     * ★ パスワード再設定メールを送信する
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this)->send(new ResetPassword($token));
    }

}
