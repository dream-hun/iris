<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $table = 'pages';

    protected $appends = [
        'about_us_image',
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'home_title',
        'home_description',
        'home_button_text',
        'about_us_header',
        'about_us_description',
        'mission_header',
        'mission_description',
        'vision_header',
        'vision_description',
        'gallery_or_portfolio_title',
        'gallery_or_portfolio_description',
        'booking_title',
        'booking_title_description',
        'booking_title_address',
        'booking_description_address',
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


    public function getAboutUsImageAttribute()
    {
        $file = $this->getMedia('about_us_image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }
}
