<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Note extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    const EXCERP_LENGTH = 100;

    protected $guarded = [
        'id',
        'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }

    public function scopeRoot(Builder $query): void
    {
        $query->where('is_archived', '=', false)
            ->where('deleted_at', '=', null)
            ->where('folder_id', '=', null);
    }

    public function scopeFavorited(Builder $query): void
    {
        $query->where('is_favorited', '=', true);
    }

    public function scopeArchived(Builder $query): void
    {
        $query->where('is_archived', '=', true);
    }

    public function getExcerpt(): string
    {
        $excerpt = $this->attributes['content'] ?? '';
        $excerpt = strip_tags($excerpt);
        return Str::of($excerpt)->excerpt('', [
            'radius' => self::EXCERP_LENGTH
        ]);
    }
}
