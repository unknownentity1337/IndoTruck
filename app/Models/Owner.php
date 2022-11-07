<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'max_users',
        'company_name',
        'phone_number',
        'expired_at'
    ];

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_at'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%' . $value . '%');
    }

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%' . $value . '%');
    }
    /**
     * Search query in multiple whereOr
     */
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::query()
            ->whereLike('current_users', $query)
            ->orWhereLike('max_users', $query)
            ->orWhereLike('phone_number', $query)
            ->orWhereLike('company_name', $query)
            ->orWhereLike('expired_at', $query)
            ->whereRelation('user', 'name', 'like', '%' . $query . '%')
            ->orWhereRelation('user', 'email', 'like', '%' . $query . '%');
    }
}