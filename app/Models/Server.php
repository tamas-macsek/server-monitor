<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Override;

#[Fillable(['user_id', 'name', 'ip_address', 'api_token', 'is_active', 'last_seen_at'])]
#[Hidden(['api_token'])]
class Server extends Model
{
    use HasFactory;

    #[Override]
    protected function casts()
    {
        return [
            'is_active' => 'boolean',
            'last_seen_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<User,$this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<Metric,$this>
     */
    public function metrics(): HasMany
    {
        return $this->hasMany(Metric::class);
    }
}
