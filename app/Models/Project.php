<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_url',
        'type_id',
        'description',
        'slug'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function getAbstract($n_chars = 30)
    {
        return (strlen($this->description) > $n_chars) ? subst($this->description, 0, $n_chars) . '...' : $this->description;
    }
}
