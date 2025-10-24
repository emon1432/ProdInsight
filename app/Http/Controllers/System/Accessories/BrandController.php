<?php

namespace App\Http\Controllers\System\Accessories;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\View\Components\Actions;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.brands.index');
    }

    public function create()
    {
        $lastBrand = Brand::orderBy('id', 'desc')->where('code', 'like', 'BR-%')->first()->code ?? 'BR-000';
        $nextBrandCode = 'BR-' . str_pad((int) substr($lastBrand, 3) + 1, 3, '0', STR_PAD_LEFT);
        return view('pages.brands.create', compact('nextBrandCode'));
    }

    public function store(BrandStoreRequest $request)
    {
        try {
            Brand::create($request->except(['_token', 'image']));
            if ($request->hasFile('image')) {
                $image = imageUploadManager($request->file('image'), $request->slug, 'brands');
                Brand::where('slug', $request->slug)->update(['image' => $image]);
            }
            return response()->json([
                'status' => 200,
                'message' => __('Brand created successfully'),
                'redirect' => route('brands.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('pages.brands.edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        try {
            $brand->update($request->except(['_token', 'image']));
            if ($request->hasFile('image')) {
                $image = imageUpdateManager($request->file('image'), $request->slug, 'brands', $brand->image);
                $brand->update(['image' => $image]);
            }
            return response()->json([
                'status' => 200,
                'message' => __('Brand updated successfully'),
                'redirect' => route('brands.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    public function destroy(Brand $brand)
    {
        try {
            if ($brand->image) {
                imageDeleteManager($brand->image);
            }
            $brand->delete();
            return response()->json([
                'status' => 200,
                'message' => __('Brand deleted successfully'),
                'redirect' => route('brands.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    private function data()
    {
        return Brand::all()->map(function ($brand) {
            $brand->actions = (new Actions([
                'model' => $brand,
                'resource' => 'brands',
                'buttons' => [
                    'basic' => [
                        'view' => true,
                        'edit' => true,
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            $brand->itemInfo = (new ItemInfo($brand->name, $brand->image, $brand->code, $brand->barcode))->render()->render();
            $brand->status = (new StatusBadge($brand->status))->render()->render();
            return $brand;
        })->toArray();
    }
}
