<?php

namespace App\Http\Controllers\System\Administrator;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\View\Components\Actions;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use App\View\Components\UserInfo;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }

        return view('pages.activity-logs.index');
    }

    public function show(ActivityLog $activityLog)
    {
        return view('pages.activity-logs.show', compact('activityLog'));
    }

    private function data()
    {
        return ActivityLog::orderBy('created_at', 'desc')->get()->map(function ($activityLog) {
            $activityLog->actions = (new Actions([
                'model' => $activityLog,
                'resource' => 'activity-logs',
                'buttons' => [
                    'basic' => [
                        'view' => true,
                        'edit' => false,
                        'delete' => false,
                    ],
                ],
            ]))->render()->render();
            $activityLog->userInfo = (new UserInfo($activityLog->user))->render()->render() ?? 'System';
            $activityLog->event = (new StatusBadge(ucwords(str_replace('_', ' ', $activityLog->event))))->render()->render();
            $activityLog->model = class_basename($activityLog->model_type);
            $item = $activityLog->subject;
            if (!$item) {
                $item = (object) ($activityLog->properties['old'] ?? $activityLog->properties['new'] ?? []);
            }
            if ($activityLog->model == 'User') {
                $activityLog->itemInfo = (new UserInfo($item))->render()->render();
            } else {
                $activityLog->itemInfo = (new ItemInfo($item->name ?? '', $item->image ?? null, $item->code ?? '', $item->barcode ?? ''))->render()->render();
            }
            $activityLog->description = $activityLog->description;
            $activityLog->ip = $activityLog->ip_address;
            $activityLog->time = $activityLog->created_at->diffForHumans();
            return $activityLog;
        })->toArray();
    }
}
