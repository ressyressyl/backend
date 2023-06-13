<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prompt;
use App\Http\Requests\PromptRequest;

class PromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prompt::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromptRequest $request)
    {
        $validated = $request->validated();

        $logs = Prompt::create($validated);

        return $logs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logs = Prompt::findOrFail($id);
        $logs->delete();
        return $logs;
    }

    public function clear()
    {
        Prompt::truncate();
    }
}
