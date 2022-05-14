<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageLog extends Model
{
    use HasFactory;

    /**
     * Disabling the default timestamps expectation
     *
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'RxIN',
        'RxENDORSED',
        'RxBIODOSED',
        'PICKED',
        'PODDED',
        'CHECKED',
        'FINALCHECKED',
        'DELIVERED'
    ];

    public function carehomes()
    {
        return $this->has(Carehome::class);
    }
}
