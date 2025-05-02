<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

    /*
     * Define relationships
     */
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }

    /*
     * Define attributes
     */

    /**
     * Return display name if not null, otherwise return username
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->display_name ?? $this->user_name;
    }

    /**
     * Return if the user is admin or not
     * @return bool
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->role_id == 1;
    }

    /*
     * Define model events
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (is_null($user->role_id)) {
                $user->role_id = 2; // assign user role by default to users
            }
        });
    }
}
