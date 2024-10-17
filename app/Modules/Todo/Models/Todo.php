<?php

declare(strict_types=1);

namespace App\Modules\Todo\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property bool $is_completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Todo newModelQuery()
 * @method static Builder|Todo newQuery()
 * @method static Builder|Todo query()
 * @method static Builder|Todo whereCreatedAt($value)
 * @method static Builder|Todo whereDescription($value)
 * @method static Builder|Todo whereId($value)
 * @method static Builder|Todo whereIsCompleted($value)
 * @method static Builder|Todo whereTitle($value)
 * @method static Builder|Todo whereUpdatedAt($value)
 * @method static Todo|null find($value)
 * @method static Todo create($value)
 */
class Todo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];
}
