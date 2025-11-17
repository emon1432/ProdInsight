<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\NonInventoryItemRequest;
use App\Models\NonInventoryItem;
use App\View\Components\Actions;
use App\View\Components\ActionBy;
use App\View\Components\Description;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class NonInventoryItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        $lastNonInventoryItem = NonInventoryItem::orderBy('id', 'desc')->where('code', 'like', 'NI-%')->first()->code ?? 'NI-000';
        $nextNonInventoryItemCode = 'NI-' . str_pad((int) substr($lastNonInventoryItem, 3) + 1, 5, '0', STR_PAD_LEFT);
        return view('pages.non-inventory-items.index', compact('nextNonInventoryItemCode'));
    }

    public function store(NonInventoryItemRequest $request)
    {
        try {
            NonInventoryItem::create($request->except(['_token']));

            return response()->json([
                'status' => 200,
                'message' => __('Non Inventory Item created successfully'),
                'redirect' => route('non-inventory-items.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function update(NonInventoryItemRequest $request, NonInventoryItem $nonInventoryItem)
    {
        try {
            $nonInventoryItem->update($request->except(['_token', '_method']));

            return response()->json([
                'status' => 200,
                'message' => __('Non Inventory Item updated successfully'),
                'redirect' => route('non-inventory-items.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(NonInventoryItem $nonInventoryItem)
    {
        try {
            $nonInventoryItem->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Non Inventory Item deleted successfully'),
                'redirect' => route('non-inventory-items.index'),
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
        return NonInventoryItem::all()->map(function ($nonInventoryItem) {
            $nonInventoryItem->actions = (new Actions([
                'model' => $nonInventoryItem,
                'resource' => 'non-inventory-items',
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
            $nonInventoryItem->itemInfo = (new ItemInfo($nonInventoryItem->name, null, $nonInventoryItem->code, null))->render()->render();
            $nonInventoryItem->status = (new StatusBadge($nonInventoryItem->status))->render()->render();
            $nonInventoryItem->description = (new Description($nonInventoryItem->description))->render()->render();
            $nonInventoryItem->createdBy = (new ActionBy($nonInventoryItem->createdBy))->render()->render();
            return $nonInventoryItem;
        })->toArray();
    }
}
