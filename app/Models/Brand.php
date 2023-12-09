<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected $fillable = [
        'name',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // Replace 'your_field' with the field you want to use for the slug
            ->saveSlugsTo('slug'); // Replace 'slug' with the column name where you want to store the slug
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brands')
            ->useDisk('brands')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/svg+xml',
                'image/webp',
                'image/gif',
                'image/svg',
            ])
            ->singleFile();
    }

    public function uploadMedia(string $pathToFile): void
    {
        $this->addMedia($pathToFile)
            ->toMediaCollection('images');
    }

    public function attachLogo($path, $fileName = ''): self
    {
        if ($fileName === '') {
            $extension = \Str::afterLast($path, '.');
            $fileName = strtolower(str_replace(['#', '/', '\\', ' '], '-', $this->name)).'_'.$this->id.'.'.$extension;
        }

        $this->addMedia($path)
            ->usingFileName($fileName)
            ->usingName($this->name.'_'.$this->id)
            ->toMediaCollection('brands');

        return $this;
    }
}
