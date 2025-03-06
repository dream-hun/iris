<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $table = 'galleries';

    protected $appends = [
        'featured_image',
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'active' => 'Activate',
        'inactive' => 'Deactivate',
    ];

    public const POSITIONING_SELECT = [
        'hero' => 'Below Home Section',
        'gallery' => 'Gallery',
    ];

    protected $fillable = [
        'title',
        'location',
        'status',
        'positioning',
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
        $this->addMediaConversion('thumb')->fit(Fit::Contain, 120, 120)->nonQueued();
        $this->addMediaConversion('preview')->fit(Fit::Contain, 300, 300)->nonQueued();
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
