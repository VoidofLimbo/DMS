<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarehomeStage;

class Carehome extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'total_patients',
        'week',
        'current_stage_id',
        'stage_log_id',
    ];

    public function carehomestages() {
        return $this->belongsTo(CarehomeStage::class, 'current_stage_id');
    }

    public function stageslogs() {
        return $this->belongsTo(StageLog::class, 'stage_log_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($carehome) {
        $currentValue = Carehome::count();
        $row = Carehome::where('id', $currentValue)->get();
        $row->each->update(['stage_log_id' => $currentValue]);
        });
    }

}
