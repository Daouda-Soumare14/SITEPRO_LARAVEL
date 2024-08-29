<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image'
    ];

    public function getCreatedAt() : String
    {
        return (new DateTime($this->created_at))->format('d/m/Y H:i');
    }

    public function excerptContent() : string
    {
        return substr($this->content, 0, 1000) . '....';
    }

    public function imageUrl() : string
    {
        return Storage::url($this->image);
    }
}
