<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    public const SCHEDULE = [ 'Full-time', 'Part-time', 'Remote' ];
    protected $fillable = [ 
        'title',
        'salary',
        'location',
        'schedule',
        'featured',
        'url',
        'employer_id',
    ];

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate([ 'name' => $name ]);

        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
