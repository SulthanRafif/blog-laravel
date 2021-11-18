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

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function makeBlog($body, $judul, $categories)
    {
        $this->blogs()->create([
            'categories' => $categories,
            'judul' => $judul,
            'body' => Str::limit(strip_tags($body), 200),
            'identifier' => Str::slug(Str::random(31) . $this->id),
            'slug' => Str::slug($judul)
        ]);
    }

    public function timeline()
    {
        $following = $this->follows->pluck('id'); 
        return Blog::whereIn('user_id', $following)
                        ->orWhere('user_id', $this->id)
                        ->latest()
                        ->get();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

}
