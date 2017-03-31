<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BranchesController extends Controller {
    public function all()
    {
        $branches = Branch::all();

        return response()->json($branches, 200);
    }

    public function slotForMonth(Request $request, $branchId)
    {
        $currentDate = Carbon::today();
        if ($request->has('date')) {
            $currentDate = Carbon::createFromTimestamp(strtotime($request->get('date')));
        }

        $branch = Branch::find($branchId);

        if (! $branch) {
            return response()->json(['invalid branch'], 400);
        }

        $slots = [];
        for ($i = 1; $i <= $currentDate->daysInMonth; $i++) {
            $activeDate = Carbon::create($currentDate->year, $currentDate->month, $i);

            if ($activeDate->isWeekend()) {
                continue;
            }

            if ($activeDate->isPast()) {
                continue;
            }

            $activeDate = $activeDate->toDateString();

            $slots[] = [
                'start'  => $activeDate,
                'allDay'    => true,
                'branch'    => $branch->name,
                'address'   => $branch->address,
                'title' => 'AM <br/>' . $this->getSlotCount('am', $activeDate, $branch) . ' slot'
            ];

            $slots[] = [
                'start'  => $activeDate,
                'allDay'    => true,
                'branch'    => $branch->name,
                'address'   => $branch->address,
                'title' => 'PM <br/>' . $this->getSlotCount('pm', $activeDate, $branch) . ' slot'
            ];
        }

        return response()->json($slots, 200);
    }

    private function getSlotCount($meridian, $date, $branch)
    {
        $currentSlot = 0;
        switch ($meridian) {
            case 'am':
                $currentSlot = $branch->am_slot;
                break;

            case 'pm':
                $currentSlot = $branch->pm_slot;
                break;
        }

        $appointments = Appointment::where('branch_id', $branch->id)
            ->whereDate('appointment_date', '=', $date)
            ->where('appointment_time', $meridian)
            ->where(function($q) {
                $q->where('status', 'pending')
                    ->orWhere('status', 'paid');
            })
            ->count();

        $currentSlot = $currentSlot - $appointments;
        if ($currentSlot <= 0) {
            $currentSlot = 0;
        }

        return $currentSlot;
    }
}