<?php

namespace App\Models;

use App\Enum\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tool extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'owner_type',
        'owner_id',
        'user_id',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public static function getTypes(): array
    {
        return [
            Phone::class,
            Notebook::class,
            Display::class,
            Printer::class,
//            SimCard::class,
//            Tablet::class,
//            WorkStation::class,
        ];
    }

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
