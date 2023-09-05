<?php

namespace App\Http\Controllers;

use App\Models\AnnualLeave;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnualLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Employee $employee)
    {
        $annualLeaves = AnnualLeave::query()->where('employee_id', $employee->id)->paginate(10);

        return view('features.employees.annual_leave.index', [
            'annualLeaves' => $annualLeaves,
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Employee $employee)
    {
        return view('features.annual_leave.create', [
            'employee' => $employee,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
        ]);


        $data['employee_id'] = $employee->id;
        $data['total_days'] = Carbon::parse($data['start_date'])->diffInDays(Carbon::parse($data['end_date'])) + 1;

        if ($data['total_days'] < 0) {
            return redirect()->back()->with('error', 'End date must be greater than start date.');
        }

        if ($data['total_days'] > 5) {
            return redirect()->back()->with('error', 'Total days must be less than five.');
        }

        $annualLeaves = AnnualLeave::create($data);

        return response()->json([
            'success' => true,
            'message' => 'AnnualLeave created.',
            'data' => $annualLeaves,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnnualLeave $annualLeaves, Employee $employee)
    {
        return view('features.annual_leave.edit', [
            'annualLeaves' => $annualLeaves,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnnualLeave $annualLeaves, Employee $employee)
    {
        $data = $request->all();

        $annualLeaves->update($data);

        return redirect()->route('annual_leaves.index')->with('success', 'AnnualLeave updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnualLeave $annualLeaves)
    {
        $annualLeaves->delete();

        return response()->json([
            'success' => true,
            'message' => 'AnnualLeave deleted.',
        ]);
    }
}
