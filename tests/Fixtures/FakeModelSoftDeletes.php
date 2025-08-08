<?php

namespace Tests\Fixtures;

use App\Models\ModelBaseTimeStamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class FakeModelSoftDeletes extends ModelBaseTimeStamps implements HasMedia
{
    use InteractsWithMedia, LogsActivity, HasTags;
    use SoftDeletes;
    
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fake_posts_models_table';


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'active' => 'boolean',
            // 'date' => 'datetime',
            // 'password' => 'hashed',
        ];
    }

    /**
     * Get the options for activity logging.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
