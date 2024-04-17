<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Test::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $test = new Test();
        $test->fill($request->all());
        $test->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Test::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->fill($request->all());
        $test->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Test::findOrFail($id)->delete();
    }

    public function byCategory($category_id)
    {
        return Test::where('category_id', $category_id)->get();
    }
}
