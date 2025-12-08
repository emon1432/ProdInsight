<?php

namespace App\Http\Controllers\System\Accessories;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\View\Components\Actions;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use App\View\Components\Tags;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }

        return view('pages.attributes.index');
    }

    public function create()
    {
        return view('pages.attributes.create');
    }

    public function store(AttributeRequest $request)
    {
        try {
            $attribute = Attribute::create($request->except(['_token', 'values']));

            foreach ($request->values as $value) {
                $attribute->values()->create([
                    'name' => $value['name'],
                    'slug' => $value['slug'],
                    'created_by' => $request->created_by,
                ]);
            }

            return response()->json([
                'status' => 200,
                'message' => __('Attribute created successfully'),
                'redirect' => route('attributes.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    public function show(string $id) {}

    public function edit(Attribute $attribute)
    {
        $attribute->load('values');
        return view('pages.attributes.edit', compact('attribute'));
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {
            $attribute->update($request->except(['_token', '_method', 'values', 'deleted_values', 'existing_values']));

            if ($request->has('deleted_values')) {
                foreach ($request->deleted_values as $id) {
                    $value = $attribute->values()->find($id);
                    if ($value) {
                        $value->delete();
                    }
                }
            }

            if ($request->has('existing_values')) {
                foreach ($request->existing_values as $existing_value) {
                    $value = $attribute->values()->find($existing_value['id']);
                    if ($value) {
                        $value->update([
                            'name' => $existing_value['name'],
                            'slug' => $existing_value['slug'],
                        ]);
                    }
                }
            }

            if ($request->has('values')) {
                foreach ($request->values as $value) {
                    $attribute->values()->create([
                        'name' => $value['name'],
                        'slug' => $value['slug'],
                        'created_by' => $request->created_by,
                    ]);
                }
            }

            return response()->json([
                'status' => 200,
                'message' => __('Attribute updated successfully'),
                'redirect' => route('attributes.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }


    public function destroy(Attribute $attribute)
    {
        try {
            $values = $attribute->values;
            foreach ($values as $value) {
                $value->delete();
            }

            $attribute->delete();
            return response()->json([
                'status' => 200,
                'message' => __('Attribute deleted successfully'),
                'redirect' => route('attributes.index'),
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
        return Attribute::all()->map(function ($attribute) {
            $attribute->actions = (new Actions([
                'model' => $attribute,
                'resource' => 'attributes',
                'buttons' => [
                    'basic' => [
                        'view' => true,
                        'edit' => true,
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            $attribute->itemInfo = (new ItemInfo($attribute))->render()->render();
            $attribute->values = (new Tags($attribute->values()->pluck('name')->join(', ')))->render()->render();
            $attribute->status = (new StatusBadge($attribute->status))->render()->render();
            return $attribute;
        })->toArray();
    }
}
