<?php

namespace App\Models;

use App\Enum\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ToolsView extends Model
{
    use HasFactory;

    protected $table = 'tools_view';
    protected $guarded = ['id'];
    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function owner(): MorphTo{

        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
