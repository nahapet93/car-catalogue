<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|EngineType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EngineType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EngineType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EngineType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EngineType whereName($value)
 * @mixin \Eloquent
 */
class EngineType extends Model
{
    use HasFactory;
}
