<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgressReport;
use Illuminate\Support\Facades\Auth;

class ProgressReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $reports = auth()->user()->role === 'contractor'
        ? ProgressReport::where('contractor_id', auth()->id())->with('project')->latest()->get()
        : ProgressReport::with('project')->latest()->get();

    return view('progress-reports.index', compact('reports'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'project_id' => 'required|exists:projects,id',
        'report_text' => 'required',
        'photo' => 'nullable|image|max:2048',
    ]);

    $photoPath = $request->hasFile('photo')
    ? $request->file('photo')->store('progress_photos', 'public')
    : null;

    ProgressReport::create([
        'project_id' => $request->project_id,
        'contractor_id' => Auth::id(),
        'report_text' => $request->report_text,
        'photo' => $photoPath,
    ]);

    return redirect()->route('progress-reports.index')->with('success', 'Laporan berhasil dikirim.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(ProgressReport $report)
{
    $report->update(['status' => 'approved']);
    return redirect()->back()->with('success', 'Laporan telah disetujui.');
}

public function reject(ProgressReport $report)
{
    $report->update(['status' => 'rejected']);
    return redirect()->back()->with('success', 'Laporan telah ditolak.');
}

}
