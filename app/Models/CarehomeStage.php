<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarehomeStage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'stage_name',
    ];

    public function carehomes()
    {
        // carehome can be in one stage at a time
        return $this->has(Carehome::class);
    }
}
