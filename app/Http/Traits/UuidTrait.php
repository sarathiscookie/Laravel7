<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{

    /**
     * UUID will automatically generate while triggering create.
     * @return \Illuminate\Http\Response
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string) Str::uuid();
        });
    }

    
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the key type for the model.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

}
