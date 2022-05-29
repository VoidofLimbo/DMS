<?php

namespace App\Http\Livewire;

use App\Models\Carehome;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class WeeklyTable extends Component
{
    use WithPagination;

    public $perpage = 10;
    public $byWeek = null;
    public $today = null;
    public $currentWeek = null;
    public $month = null;
    public $monthCounter = null;

    public function render()
    {
        $this->currentWeek = Carbon::parse($this->currentWeek) ?? Carbon::now();
        $this->today = Carbon::parse($this->today) ?? Carbon::today();
        $this->monthCounter = Carbon::createFromDate(
            $this->today->year,
            $this->today->month,
            $this->today->day
        );
        $this->month = $this->month ?? $this->today->month;
        $this->today->month = $this->month;
        $this->byWeek = $this->byWeek ?? Carbon::today()->startOfWeek();
        // dd($this->today->monthName);
        // $this->today->day = 1;
        // dd($this->today->startOfWeek()->isoFormat('Do MMM'));

        return view('livewire.weekly-table', [
            'carehomes' => Carehome::query()
            ->with(['carehomestages', 'stageslogs'])
            ->where('delivery_date', '>=', $this->byWeek)
            ->where('delivery_date', '<=', Carbon::parse($this->byWeek)->addDays(6))
            ->paginate($this->perpage),
        ]);
    }
}
