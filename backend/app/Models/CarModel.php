<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $year
 * @property int $price
 * @property int $brand_id
 * @property int $engine_type_id
 * @property int $transmission_type_id
 * @property int $exterior_color_id
 * @property int $interior_color_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\EngineType $engineType
 * @property-read \App\Models\Color $exteriorColor
 * @property-read \App\Models\Color $interiorColor
 * @property-read \App\Models\TransmissionType $transmissionType
 * @method static \Database\Factories\CarModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereEngineTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereExteriorColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereInteriorColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereTransmissionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereYear($value)
 * @mixin \Eloquent
 */
class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'year',
        'brand_id',
        'exterior_color_id',
        'interior_color_id',
        'engine_type_id',
        'transmission_type_id'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function interiorColor(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'interior_color_id');
    }

    public function exteriorColor(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'exterior_color_id');
    }

    public function engineType(): BelongsTo
    {
        return $this->belongsTo(EngineType::class);
    }

    public function transmissionType(): BelongsTo
    {
        return $this->belongsTo(TransmissionType::class);
    }
}
