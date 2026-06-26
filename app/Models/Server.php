<?php

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Override;

#[Fillable(['user_id', 'name', 'ip_address', 'api_token', 'is_active', 'last_seen_at'])]
#[Hidden(['api_token'])]
class Server extends Model
{
    #[Override]
    protected function casts()
    {
        return [
            'is_active' => 'boolean',
            'last_seen_at' => 'datetime'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function metrics(): HasMany
    {
        return $this->hasMany(Metric::class);
    }
}
