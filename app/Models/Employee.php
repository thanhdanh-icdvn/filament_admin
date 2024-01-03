<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'dob', 'email', 'mobile_number', 'gender', 'province_code', 'district_code', 'ward_code', 'street', 'department_id', 'status', 'employee_id'];

    protected $casts = [
        'gender' => GenderEnum::class,
    ];

    protected $appends = ['full_name'];

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

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function getFullNameAttribute(): string
    {
        return preg_replace('/\s+/', ' ', ucfirst($this->first_name).' '.ucfirst($this->last_name));
    }

    public function scopeWhereFullName(Builder $query, string $name)
    {
        return $query->whereRaw("CONCAT(first_name, ' ', last_name) = ?", [$name]);
    }
}
