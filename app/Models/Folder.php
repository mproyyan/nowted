<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Folder::class, 'parent_folder');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Folder::class, 'parent_folder');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'folder_id');
    }

    public function scopeRoot(Builder $query): void
    {
        $query->where('is_archived', '=', false)
            ->where('deleted_at', '=', null)
            ->where('parent_folder', '=', null);
    }

    public function scopeFavorited(Builder $query): void
    {
        $query->where('is_favorited', '=', true);
    }

    public function scopeArchived(Builder $query): void
    {
        $query->where('is_archived', '=', true);
    }
}
