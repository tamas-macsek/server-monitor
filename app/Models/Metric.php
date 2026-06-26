<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

#[Fillable(['server_id', 'cpu_usage', 'memory_usage', 'disk_usage', 'load_average', 'recorded_at'])]
class Metric extends Model
{
    #[Override]
    protected function casts()
    {
        return [
            'recorded_at' => 'datetime'
        ];
    }

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }
}
