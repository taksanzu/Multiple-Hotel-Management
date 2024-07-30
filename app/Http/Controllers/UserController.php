<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Rooms;
use App\Models\Setting;
use App\Models\User;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ServiceCategory;
use App\Models\ServiceUser;
use App\Models\Service;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->roles == 0) {
                $userLists = User::where('status', 0)->paginate(12);
            } else {
                return redirect()->route('userHome');
            }
            $search = $request->search;
            if ($search) {
                $userLists = User::where('name', 'like', '%' . $search . '%')->paginate(12);
            }
            return view('pages.userList.userList', ['userLists' => $userLists, 'user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $password = $request->id ? User::findOrFail($id)->password : Hash::make('123456');
        $user = User::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'domain' => $request->domain,
                'password' => $request->password ? Hash::make($request->password) : $password,
                'roles' => $request->roles,
            ]
        );

        if($user->settings->count() == 0) {
            $this->initInformation($user->id);
        }

        if($user->rooms->count() == 0) {
            $this->initRoom($user->id);
        }

        if($user->news->count() == 0) {
            $this->initNews($user->id);
        }

        if($user->images->count() == 0) {
            $this->initImages($user->id);
        }

        return redirect()->route('userList');
    }

    public function getUser(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        if ($user->id == Auth::id()) {
            return response()->json(['error' => 'Không thể xóa tài khoản đang đăng nhập']);
        }else{
            $user->update([
                'status' => 1
            ]);
            return response()->json(['success' => 'Xóa tài khoản thành công']);
        }
    }

    public function initInformation($user_id)
    {
        $settings_key = [
            'name' => 'Khách sạn Vũng Tàu',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'address' => '78 Huyền Trân Công Chúa, P.8, Tp. Vũng Tàu',
            'gioi_thieu_1' => 'Điểm đến tuyệt vời vào mùa hè',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'instagram' => 'https://www.instagram.com/',
            'googlemap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.916251467006!2d107.07961537479859!3d10.348581489775375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756fec40a8e19d%3A0x1c99e485c14b2601!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6AgUuG7i2EgLSBWxaluZyBUw6B1!5e0!3m2!1svi!2s!4v1708326525773!5m2!1svi!2s',
            'gioi_thieu_2' => 'Điểm đến tuyệt vời vào mùa hè',
            'youtube' => 'https://www.youtube.com/embed/1a2b3c4d5e6f7g8h9i0j',
            'linkweb' => 'https://web-premierpearlhotel.vt360.vn/',
            'template' => 'mau1',
        ];

        foreach ($settings_key as $key => $value) {
            Setting::updateOrCreate(
                ['user_id' => $user_id, 'name' => $key],
                ['user_id' => $user_id, 'name' => $key, 'value' => $value]
            );
        }
    }

    public function initRoom($user_id)
    {
        $rooms = Rooms::where('created_by', 1)->with('roomImages')->limit(2)->get();

        if ($rooms->isNotEmpty()) {
            foreach ($rooms as $room) {
                $newRoom = $room->replicate();
                $newRoom->created_by = $user_id;
                $newRoom->status = 1;
                $newRoom->deleted = 0;
                $newRoom->save();

                if ($room->roomImages->isNotEmpty()) {
                    foreach ($room->roomImages as $image) {
                        $newImage = $image->replicate();
                        $newImage->room_id = $newRoom->id;
                        $newImage->save();
                    }
                }
            }
        }
    }

    public function initNews($user_id)
    {
        $news = News::where('created_by', 1)->where('type', 0)->first();
        $news1 = News::where('created_by', 1)->where('type', 1)->first();

        if ($news) {
            $newNews = $news->replicate();
            $newNews->created_by = $user_id;
            $newNews->status = 1;
            $newNews->deleted = 0;
            $newNews->save();
        }

        if ($news1) {
            $newNews1 = $news1->replicate();
            $newNews1->created_by = $user_id;
            $newNews1->status = 1;
            $newNews1->deleted = 0;
            $newNews1->save();
        }
    }

    public function initImages($user_id)
    {
        $images = Images::where('created_by', 1)->limit(4)->get();

        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                $newImage = $image->replicate();
                $newImage->created_by = $user_id;
                $newImage->save();
            }
        }
    }

    public function initService($user_id)
    {
        $service = Service::all();
        foreach ($service as $key => $value) {
            $service_user = new ServiceUser();
            $service_user->user_id = $user_id;
            $service_user->service_id = $value->id;
            $service_user->save();
        }
    }
}
