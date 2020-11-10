<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadFile extends Model
{
    protected $table = 'download_file';
    protected $fillable = ['image', 'title', 'file'];
}
