<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatisticRequest;
use App\Models\CompanyStatistic;
use Illuminate\Support\Facades\DB; // Menggunakan DB dengan benar
use Illuminate\Http\Request;

class CompanyStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = CompanyStatistic::orderByDesc('id')->paginate(10);
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengembalikan view untuk form create
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        // closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            CompanyStatistic::create($validated);
        });

        // Redirect ke halaman index
        return redirect()->route('admin.statistics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyStatistic $companyStatistic)
    {
        // Belum ada implementasi
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyStatistic $companyStatistic)
    {
        // Belum ada implementasi

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyStatistic $companyStatistic)
    {
        // Belum ada implementasi
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStatistic $statistic)
    {
        // Belum ada implementasi
        DB::transaction(function () use ($statistic) {
            $statistic->delete();
        });

        return redirect()->route('admin.statistics.index');
    }
}
