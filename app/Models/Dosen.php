<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'dosen';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nip',
        'username',
        'password',
        'nama',
        'alamat',
        'nohp',
        'role',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Check if dosen is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if dosen is kaprodi
     */
    public function isKaprodi(): bool
    {
        return $this->role === 'kaprodi';
    }

    /**
     * Check if dosen is regular dosen
     */
    public function isDosen(): bool
    {
        return $this->role === 'dosen';
    }

    /**
     * Check if dosen has specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }
} 