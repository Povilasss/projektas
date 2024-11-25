<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conference extends Model
{
    use HasFactory;

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'lecturers',
        'date',
        'time',
        'address',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
        'time' => 'string',
    ];

    /**
     * Ryšys su vartotojais (daugelis prie daugelio).
     * Konferencija gali turėti daugybę dalyvių.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_conferences', 'conference_id', 'user_id')
            ->withTimestamps();
    }
}

