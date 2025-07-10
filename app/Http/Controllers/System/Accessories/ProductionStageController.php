<?php

namespace App\Http\Controllers\System\Accessories;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionStageStoreRequest;
use App\Http\Requests\ProductionStageUpdateRequest;
use App\Models\ProductionStage;
use App\View\Components\Actions;
use App\View\Components\CreatedBy;
use App\View\Components\Description;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class ProductionStageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        $lastProductionStage = ProductionStage::orderBy('id', 'desc')->where('code', 'like', 'PS-%')->first()->code ?? 'PS-0000';
        $nextProductionStageCode = 'PS-' . str_pad((int) substr($lastProductionStage, 3) + 1, 4, '0', STR_PAD_LEFT);
        return view('pages.production-stages.index', compact('nextProductionStageCode'));
    }

    public function store(ProductionStageStoreRequest $request)
    {
        try {
            ProductionStage::create($request->except(['_token']));

            return response()->json([
                'status' => 200,
                'message' => __('Production Stage created successfully'),
                'redirect' => route('production-stages.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function update(ProductionStageUpdateRequest $request, ProductionStage $productionStage)
    {
        try {
            $productionStage->update($request->except(['_token', '_method']));

            return response()->json([
                'status' => 200,
                'message' => __('Production Stage updated successfully'),
                'redirect' => route('production-stages.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(ProductionStage $productionStage)
    {
        try {
            $productionStage->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Production Stage deleted successfully'),
                'redirect' => route('production-stages.index'),
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
        return ProductionStage::all()->map(function ($productionStage) {
            $productionStage->actions = (new Actions([
                'model' => $productionStage,
                'resource' => 'production-stages',
                'buttons' => [
                    'basic' => [
                        'view' => false,
                        'edit' => [
                            'modal' => true,
                        ],
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            $productionStage->itemInfo = (new ItemInfo($productionStage->name, null, $productionStage->code, null))->render()->render();
            $productionStage->status = (new StatusBadge($productionStage->status))->render()->render();
            $productionStage->description = (new Description($productionStage->description))->render()->render();
            $productionStage->createdBy = (new CreatedBy($productionStage->createdBy))->render()->render();
            return $productionStage;
        })->toArray();
    }
}
