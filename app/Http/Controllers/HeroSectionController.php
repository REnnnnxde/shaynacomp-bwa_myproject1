<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeroSectionRequest;
use App\Models\HeroSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $hero_sections = HeroSection::orderByDesc('id')->paginate(10);
        return view('admin.hero_sections.index', compact('hero_sections'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.hero_sections.create', );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeroSectionRequest $request)
    {
        //
         // closure-based transaction
         DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banner', 'public');
                $validated['banner'] = $bannerPath;
            }

            HeroSection::create($validated);
        });

        // Redirect ke halaman index
        return redirect()->route('admin.hero_sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSection $heroSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $heroSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $heroSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        //
    }
}
