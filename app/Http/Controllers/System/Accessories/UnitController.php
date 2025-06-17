<?php

namespace App\Http\Controllers\System\Accessories;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Models\Unit;
use App\View\Components\Actions;
use App\View\Components\CreatedBy;
use App\View\Components\Description;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.units.index');
    }

    public function store(UnitStoreRequest $request)
    {
        try {
            Unit::insert($request->except(['_token']));

            return response()->json([
                'status' => 200,
                'message' => __('Unit created successfully'),
                'redirect' => route('units.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function update(UnitUpdateRequest $request, string $id)
    {
        try {
            $unit = Unit::findOrFail($id);
            $unit->update($request->except(['_token', '_method']));

            return response()->json([
                'status' => 200,
                'message' => __('Unit updated successfully'),
                'redirect' => route('units.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $unit = Unit::findOrFail($id);
            $unit->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Unit deleted successfully'),
                'redirect' => route('units.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    private function data()
    {
        $units = Unit::all()->map(function ($unit) {
            $unit->actions = (new Actions(
                [
                    'model' => $unit,
                    'resource' => 'units',
                    'buttons' => [
                        'basic' => [
                            'view' => false,
                            'edit' => [
                                'modal' => true,
                            ],
                            'delete' => true,
                        ],
                    ],
                ]
            ))->render()->render();
            $unit->status = (new StatusBadge($unit->status))->render()->render();
            $unit->description = (new Description($unit->description))->render()->render();
            $unit->createdBy = (new CreatedBy($unit->createdBy))->render()->render();
            return $unit;
        });
        return $units;
    }
}
