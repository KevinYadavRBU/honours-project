<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<BookFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = ['title', 'author', 'status'];

    /**
     * Allowed book statuses and their labels.
     *
     * @var array<string, string>
     */
    public const STATUSES = [
        'to-read' => 'To read',
        'reading' => 'Reading',
        'finished' => 'Finished',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'status' => 'to-read',
    ];
}
