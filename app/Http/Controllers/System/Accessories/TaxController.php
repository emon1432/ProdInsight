<?php

namespace App\Http\Controllers\System\Accessories;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxRequest;
use App\Models\Tax;
use App\View\Components\Actions;
use App\View\Components\CreatedBy;
use App\View\Components\Description;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.taxes.index');
    }

    public function store(TaxRequest $request)
    {
        try {
            Tax::create($request->except(['_token']));

            return response()->json([
                'status' => 200,
                'message' => __('Tax created successfully'),
                'redirect' => route('taxes.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function update(TaxRequest $request, Tax $tax)
    {
        try {
            $tax->update($request->except(['_token', '_method']));

            return response()->json([
                'status' => 200,
                'message' => __('Tax updated successfully'),
                'redirect' => route('taxes.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(Tax $tax)
    {
        try {
            $tax->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Tax deleted successfully'),
                'redirect' => route('taxes.index'),
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
        return Tax::all()->map(function ($tax) {
            $tax->actions = (new Actions([
                'model' => $tax,
                'resource' => 'taxes',
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
            $tax->display_name = $tax->name;
            $tax->calculation_method_type = ucfirst($tax->calculation_method) . ' - ' . ucfirst($tax->type);
            $tax->rate_display = $tax->calculation_method === 'Percentage' ? $tax->rate . '%' : format_amount($tax->rate);
            $tax->status = (new StatusBadge($tax->status))->render()->render();
            $tax->description = (new Description($tax->description))->render()->render();
            $tax->createdBy = (new CreatedBy($tax->createdBy))->render()->render();
            return $tax;
        })->toArray();
    }
}
