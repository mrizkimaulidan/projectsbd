<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'name', 'email', 'body', 'is_verified', 'verified_by'];

    /**
     * Get article relationship data.
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    /**
     * Get user relationship data.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Scope a query where is verified status dynamic on parameter.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  bool  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsVerified(Builder $query, bool $status)
    {
        return $query->where('is_verified', $status);
    }
}
