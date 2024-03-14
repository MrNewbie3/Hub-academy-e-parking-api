<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cameras = Camera::all();
        return response()->json($cameras);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Camera $camera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camera $camera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $camera = Camera::find($id);

        if ($camera) {
            // If the camera exists, update the is_active field
            $camera->update(['is_active' => $request->input('is_active')]);
        } else {
            // If the camera doesn't exist, create a new camera with the given ID
            $camera = Camera::create(['id' => $id] + $request->all());
        }

        return response()->json($camera);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camera $camera)
    {
        //
    }
}
