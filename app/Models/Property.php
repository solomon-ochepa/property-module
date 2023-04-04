<?php

namespace Modules\Property\app\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\app\Models\Address;
use Modules\Attribute\app\Models\Attributable;
use Modules\Category\app\Models\Category;
use Modules\Status\app\Models\Status;
use Plank\Mediable\Mediable;

class Property extends Model
{
    use HasFactory, HasUuids, Mediable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', 'slug', 'address_id', 'price', 'type', 'description'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function attributables()
    {
        return $this->morphMany(Attributable::class, 'attributable');
    }
}
