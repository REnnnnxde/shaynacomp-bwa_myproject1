<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'thumbnail',
        'massage',
        'project_client_id',
        'description',
    ];

    public function client(){
        return $this ->belongsTo(ProjectClient::class, 'project_client_id', 'id');

    }
}
