<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceUser;use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $service_categories = ServiceCategory::all();
        return view('pages.services.index', ['service_categories' => $service_categories]);
    }
    public function storeCategory(Request $request)
    {
        $serviceCategory = ServiceCategory::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'created_by' => Auth::user()->id,
            ]
        );

        return response()->json($serviceCategory);
    }

    public function storeService(Request $request)
    {
        $service = Service::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'created_by' => Auth::user()->id,
            ]
        );

        return response()->json($service);
    }

    public function change_status(Request $request)
    {
        $service_user = ServiceUser::where('service_id', $request->service_id)
            ->where('room_id', $request->id)
            ->first();
        $service_user = ServiceUser::updateOrCreate(
            ['service_id' => $request->service_id, 'room_id' => $request->id],
            ['status' => $service_user->status == 1 ? 0 : 1]
        );

        return response()->json($service_user);
    }
}
