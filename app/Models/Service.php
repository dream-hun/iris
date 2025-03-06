<?php

namespace App\Models;

use Akaunting\Money\Money;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = 'services';

    protected $appends = [
        'featured_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'duration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit(Fit::Contain, 50, 50);
        $this->addMediaConversion('preview')->fit(Fit::Contain, 120, 120);
    }

    public function getFeaturedImageAttribute(): ?array
    {
        $file = $this->getMedia('featured_image')->last();

        return $file ? [
            'url' => $file->getUrl(),
            'thumbnail' => $file->getUrl('thumb'),
            'preview' => $file->getUrl('preview'),
        ] : null;
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function formatedPrice(): Money
    {
        return Money::CAD($this->price);
    }
}
