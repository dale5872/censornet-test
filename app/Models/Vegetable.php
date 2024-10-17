<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id Vegetable ID
 * @property string $name Vegetable name
 * @property string $classification Vegetable Classification
 * @property string $description Vegetable Description
 * @property boolean $edible Is Vegetable Edible?
 */
class Vegetable extends Model
{
    use HasFactory;

    /**
     * Indicates to the Eloquent ORM that timestamps should not be
     * added to this model
     * @var bool
     */
    public $timestamps = false;

    /**
     * Defines a list of attributes that should be cast
     *
     * @var array<string, string>
     */
    public $casts = [
        'edible' => 'boolean'
    ];

    /**
     * Defines a list of attributes
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'classification',
        'description',
        'edible'
    ];
}
