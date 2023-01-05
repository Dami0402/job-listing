<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Advert extends Model
{
    
    use HasFactory;

    protected $fillable = ['title', 'description', 'location', 'number', 'name', 'slug', 'user_id' ]; 


    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function permalink()
    {
        //return route("adverts.show", $this->slug);
        return $this->slug ? route("adverts.show", $this->slug) : '#';
    }

    public function route($method, $key = 'id')
    {
        return route("adverts.{$method}", $this->$key);
    }

    public function title()
    {
        return $this->title;
    }
    public function name()
    {
        return $this->name;
    }

    public function getSlug()
    {
        $slug = str($this->title)->slug();
        $numSlugsFound = static::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();
        if ($numSlugsFound > 0) {
            return $slug . "-" .$numSlugsFound + 1;
        }
        return $slug;
    }
    protected static function booted()
    {
        static::creating(function ($advert) {
            if (isset($advert->title) && $advert->title) {
                $advert->slug = $advert->getSlug();
                $advert->is_published = true;
            }
        });
    
        static::updating(function ($advert) {
            if (isset($advert->title) && $advert->title && !$advert->slug) {
                $advert->slug = $advert->getSlug();
                $advert->is_published = true;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incrementViewCount() {
        $this->views_count++;
        return $this->save();
    }
}

