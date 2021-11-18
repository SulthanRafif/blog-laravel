<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * Inisialisasi Factory untuk Model Blog
     * 
     * @var HasFactory
     */
    use HasFactory;

    /**
     * Kolom pada Tabel Blogs yang dapat diisi
     * 
     * @var fillable
     */
    protected $fillable = ['body', 'identifier', 'judul', 'slug', 'categories'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relasi terhadap Tabel Blogs dengan Tabel Users
     * 
     * @return $this->belongsTo(User::class);
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
