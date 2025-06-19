<?php

namespace App\Http\Controllers\System\Accessories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyStoreRequest;
use App\Http\Requests\CurrencyUpdateRequest;
use App\Models\Currency;
use App\View\Components\Actions;
use App\View\Components\CreatedBy;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.currencies.index');
    }

    public function store(CurrencyStoreRequest $request)
    {
        try {
            Currency::create($request->except(['_token']));

            return response()->json([
                'status' => 200,
                'message' => __('Currency created successfully'),
                'redirect' => route('currencies.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function update(CurrencyUpdateRequest $request, Currency $currency)
    {
        try {
            $currency->update($request->except(['_token', '_method']));

            return response()->json([
                'status' => 200,
                'message' => __('Currency updated successfully'),
                'redirect' => route('currencies.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(Currency $currency)
    {
        try {
            $currency->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Currency deleted successfully'),
                'redirect' => route('currencies.index'),
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
        return Currency::all()->map(function ($currency) {
            $buttons = [];
            if ($currency->id != 1) {
                $buttons = [
                    'basic' => [
                        'view' => false,
                        'edit' => [
                            'modal' => true,
                        ],
                        'delete' => true,
                    ],
                ];
            }
            $currency->actions = (new Actions([
                'model' => $currency,
                'resource' => 'currencies',
                'buttons' => $buttons,
            ]))->render()->render();
            $currency->status = (new StatusBadge($currency->status))->render()->render();
            $currency->createdBy = (new CreatedBy($currency->createdBy))->render()->render();
            $currency->conversion_rate = '$ 1 = ' . ($currency->position === 'Left' ? $currency->symbol . ' ' . $currency->conversion_rate : $currency->conversion_rate . ' ' . $currency->symbol);
            return $currency;
        })->toArray();
    }
}
