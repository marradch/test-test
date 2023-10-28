<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\TestStoreRequest;
use Illuminate\Http\RedirectResponse;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('tests.index', [
            'tests' => Test::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestStoreRequest $request): RedirectResponse
    {
        $user = new Test();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('tests.index')
            ->withSuccess('New test is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        return view('tests.show', [
            'test' => $test
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test): View
    {
        return view('tests.edit', [
            'test' => $test
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestStoreRequest $request, Test $test): RedirectResponse
    {
        $test->fill($request->all());
        $test->save();

        return redirect()->back()
            ->withSuccess('Test is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test): RedirectResponse
    {
        $test->delete();

        return redirect()->route('tests.index')
            ->withSuccess('Test is deleted successfully');
    }

    public function setScore(Test $test): View
    {
        return view('tests.set-score', [
            'test' => $test
        ]);
    }

    public function storeScore(Request $request, Test $test): mixed
    {
        $request->validate(['score' => 'required|integer|max:100']);

        $test->score = $request->score;
        $test->manager_id = auth()->user()->id;
        $test->setCriteriaByScore();
        $test->save();

        return redirect()->route('tests.show', $test->id)
            ->withSuccess('Score for test set successfully');
    }
}
