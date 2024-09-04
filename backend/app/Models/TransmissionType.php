<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|TransmissionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransmissionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransmissionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransmissionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransmissionType whereName($value)
 * @mixin \Eloquent
 */
class TransmissionType extends Model
{
    use HasFactory;
}
