<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $file_mp3
 * @property string $file_ogg
 * @property string $title
 * @property string $description
 * @property Carbon $created_at
 * @property \Illuminate\Support\Collection $files
 *
 * @package App\Models
 */
class Podcast extends Model
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFilesAttribute()
    {
        return collect([
            'mp3' => $this->file_mp3,
            'ogg' => $this->file_ogg,
        ]);
    }
}
