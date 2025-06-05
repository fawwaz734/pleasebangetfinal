<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str; // PENTING: Tambahkan ini untuk menggunakan Str::uuid()

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    
    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 
    

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    // --- PENTING: Tambahkan metode boot() ini ---
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengisi kolom 'id' dengan UUID baru sebelum menyimpan
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
    // ------------------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'money',
        'role',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}