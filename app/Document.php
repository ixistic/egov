<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'officer_id', 'filename', 'file_folder'
    ];
}
