<?php

namespace App\Models;

use App\Models\Blog;
use App\Events\UserCreated;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * Kolom pada Tabel Users yang dapat diisi
     * 
     * @var fillable
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * Kolom pada Tabel Users yang bersifat hidden
     * 
     * @var hidden
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Menentukan Tipe Data pada Kolom email_verified_at pada Tabel Users
     * 
     * @var cast
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Proses enkripsi Data Password yang dimasukkan saat proses Registrasi 
     * 
     * @var this->attributes['password']
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Relasi terhadap Tabel Users dengan Tabel Blogs yang bersifat One to Many
     * 
     * @var this->attributes['password']
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Relasi terhadap Tabel Users dengan Tabel Blogs yang bersifat One to Many
     * 
     * @var following
     */
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }
}
