<?php

namespace App\Models;

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
}
