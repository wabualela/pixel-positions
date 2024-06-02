<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
    ]; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // employer has a jobs
    public function jobs(): HasMany 
    {
        return $this->hasMany(Job::class);
    }
}
