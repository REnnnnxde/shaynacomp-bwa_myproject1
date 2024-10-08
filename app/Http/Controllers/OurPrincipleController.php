<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipleRequest;
use App\Models\OurPrinciple;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OurPrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          
        $principles = OurPrinciple::orderByDesc('id')->paginate(10);
        return view('admin.principles.index', compact('principles'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.principles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrincipleRequest $request)
    {
        //
         // closure-based transaction
         DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath; //Storage/icons/icon.png
            }
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath; //Storage/thumbnails/thumbnail.png
            }

            OurPrinciple::create($validated);
        });

        // Redirect ke halaman index
        return redirect()->route('admin.principles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurPrinciple $ourPrinciple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurPrinciple $ourPrinciple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurPrinciple $ourPrinciple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPrinciple $ourPrinciple)
    {
        //
    }
}
