<?php

namespace App\Http\Controllers;

use App\Models\CompanyStatistic;
use Illuminate\Http\Request;

class CompanyStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
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

public function store(Request $request)
{
    // Logika untuk menyimpan data statistik baru
    // Validasi dan penyimpanan data ke database
}


    /**
     * Display the specified resource.
     */
    public function show(CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyStatistic $companyStatistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyStatistic $companyStatistic)
    {
        //
    }
}
