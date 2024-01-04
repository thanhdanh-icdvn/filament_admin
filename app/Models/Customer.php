<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'username',
        'province_code',
        'district_code',
        'ward_code',
        'mobile_number',
        'postal_code',
        'street',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['full_name'];
    protected $casts = [
        'active' => boolean
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getFullNameAttribute(): string
    {
        return preg_replace('/\s+/', ' ', ucfirst($this->first_name) . ' ' . ucfirst($this->last_name));
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class, 'ward_code', 'code');
    }

    public function scopeWhereFullName(Builder $query, string $name)
    {
        return $query->whereRaw("CONCAT(first_name, ' ', last_name) = ?", [$name]);
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', true);
    }

    public function scopeInactive(Builder $builder): Builder
    {
        return $builder->where('active', false);
    }
}
