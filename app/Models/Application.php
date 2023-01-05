<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'number', 'resume', 'slug', 'advert_id'];

    public function permalink()
    {
        //return route("applications.show", $this->id);
        return $this->id ? route("applications.show", $this->id) : '#';
    }
    public function route($method, $key = 'id')
    {
        return route("application.{$method}", $this->$key);
    }
}
