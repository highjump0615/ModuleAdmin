<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'filePath',
    ];

    protected $appends = [
        'filename_display'
    ];

    use softDeletes;

    /**
     * Get the module name for user display
     *
     * @return bool|string
     */
    public function getFilenameDisplayAttribute() {
        return substr($this->filePath, strlen(date('YmdHis')));
    }
}
