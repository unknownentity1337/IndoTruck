<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'max_users',
        'expired_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
            ->orWhereLike('expired_at', $query)
            ->whereRelation('user', 'name', 'like', '%' . $query . '%')
            ->orWhereRelation('user', 'email', 'like', '%' . $query . '%');
    }
}