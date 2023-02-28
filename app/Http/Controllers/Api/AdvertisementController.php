<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WebAd;
use App\Models\WebAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AdvertisementController extends Controller
{

    public function mobileAd(Request $request)
    {
        $target = DB::table('web_advertisements')->first();
//        dd($target);
        return view('admin.advertisement.create')->with(compact('target'));
    }

    public function webAdvertisement(Request $request)
    {
        $target = DB::table('web_ads')->get();
//        dd($target);
        return response([
            'status' => "success",
            "data" => $target
        ]);
    }

    public function webAd(Request $request)
    {
        $adsenseSizeArr = [
            '120*90', '120*240', '120*600', '125*125', '160*90', '160*600',
            '180*90', '180*150', '200*90', '200*200', '234*60', '250*250',
            '320*100', '300*250', '300*600', '300*1050', '320*50', '336*280',
            '360*300', '435*300', '468*15', '468*60', '640*165', '640*190',
            '640*300', '728*15', '728*90', '970*90', '970*250', '240*400-Regional ad size',
            '250*360-Regional ad size', '580*400-Regional ad size', '750*100-Regional ad size', '750*200-Regional ad size',
            '750*300-Regional ad size', '980*120-Regional ad size', '930*180-Regional ad size',
        ];
        $target = WebAd::get();
        return view('admin.advertisement.create')->with(compact('target', 'adsenseSizeArr'));
    }


    public function webAdUpdate(Request $request)
    {
        try {


//                 dd($request->all());

                $data = $target = [];
                if (!empty($request->ad_type)) {
                    foreach ($request->ad_type as $adType) {
                        $data[$adType]['ad_type']    = $adType;
                        $data[$adType]['created_at'] = date('Y-m-d H:i:s');
                        $data[$adType]['updated_at'] = date('Y-m-d H:i:s');
                    }
                }
                if (!empty($request->add_link)) {
                    foreach ($request->add_link as $adType => $link) {
                        $data[$adType]['add_link'] = $link ?? null;
                    }
                }
                if (!empty($request->add_title)) {
                    foreach ($request->add_title as $adType => $title) {
                        $data[$adType]['add_title'] = $title ?? null;
                    }
                }
                if (!empty($request->show_per_video_category)) {
                    foreach ($request->show_per_video_category as $adType => $title) {
                        $data[$adType]['show_per_video_category'] = $title ?? null;
                    }
                }
                if (!empty($request->disable_desktop)) {
                    foreach ($request->disable_desktop as $adType => $desktop) {
                        $data[$adType]['disable_desktop'] = $desktop ?? null;
                    }
                }
                if (!empty($request->disable_tablet_landscape)) {
                    foreach ($request->disable_tablet_landscape as $adType => $tabletLand) {
                        $data[$adType]['disable_tablet_landscape'] = $tabletLand ?? null;
                    }
                }
                if (!empty($request->disable_tablet_portrait)) {
                    foreach ($request->disable_tablet_portrait as $adType => $tabletPort) {
                        $data[$adType]['disable_tablet_portrait'] = $tabletPort ?? null;
                    }
                }
                if (!empty($request->disable_phone)) {
                    foreach ($request->disable_phone as $adType => $phone) {
                        $data[$adType]['disable_phone'] = $phone ?? null;
                    }
                }

                if (!empty($request->desktop_adsense)) {
                    foreach ($request->desktop_adsense as $adType => $desktop) {
                        $data[$adType]['desktop_adsense'] = $desktop ?? null;
                    }
                }
                if (!empty($request->tablet_landscape_adsense)) {
                    foreach ($request->tablet_landscape_adsense as $adType => $tabletLand) {
                        $data[$adType]['tablet_landscape_adsense'] = $tabletLand ?? null;
                    }
                }
                if (!empty($request->tablet_portrait_adsense)) {
                    foreach ($request->tablet_portrait_adsense as $adType => $tabletPort) {
                        $data[$adType]['tablet_portrait_adsense'] = $tabletPort ?? null;
                    }
                }
                if (!empty($request->phone_adsense)) {
                    foreach ($request->phone_adsense as $adType => $phone) {
                        $data[$adType]['phone_adsense'] = $phone ?? null;
                    }
                }

                //image
                if (!empty($request->image)) {
                    foreach ($request->image as $adType => $img) {
                        $image     = $img;
                        $imageName = time() . '.' . $image->getClientOriginalName();
                        $image->move('uploads//ad', $imageName);
                        $data[$adType]['image'] = $imageName;
                    }
                }

                //custom status
                if (!empty($request->status)) {
                    $data['custom_header']['status']         = 'on';
                    $data['custom_site_banner']['status'] = 'on';
                    $data['custom_upcoming_matches']['status']    = 'on';
                    $data['custom_popup']['status']  = 'on';
                } else {
                    $data['header']['status']         = 'on';
                    $data['site_banner']['status'] = 'on';
                    $data['upcoming_matches']['status']    = 'on';
                    $data['popup']['status']  = 'on';
                }


                $prevImg = WebAd::pluck('image', 'ad_type')->toArray();
                // dd($data);

                if (!empty($data)) {
                    foreach ($data as $fieldName => $column) {
                        $target[$fieldName]['ad_type'] = $column['ad_type'];
                        $target[$fieldName]['status']  = $column['status'] ?? 'off';

                        $target[$fieldName]['ad_link']                 = $column['add_link'] ?? null;
                        $target[$fieldName]['ad_title']                = $column['add_title'] ?? null;
                        $target[$fieldName]['show_per_video_category'] = $column['show_per_video_category'] ?? null;
                        $target[$fieldName]['image']                   = $column['image'] ?? ($prevImg[$fieldName] ?? null);

                        $target[$fieldName]['disable_desktop']          = $column['disable_desktop'] ?? 'off';
                        $target[$fieldName]['disable_tablet_landscape'] = $column['disable_tablet_landscape'] ?? 'off';
                        $target[$fieldName]['disable_tablet_portrait']  = $column['disable_tablet_portrait'] ?? 'off';
                        $target[$fieldName]['disable_phone']            = $column['disable_phone'] ?? 'off';

                        $target[$fieldName]['desktop_adsense']          = $column['desktop_adsense'] ?? null;
                        $target[$fieldName]['tablet_landscape_adsense'] = $column['tablet_landscape_adsense'] ?? null;
                        $target[$fieldName]['tablet_portrait_adsense']  = $column['tablet_portrait_adsense'] ?? null;
                        $target[$fieldName]['phone_adsense']            = $column['phone_adsense'] ?? null;

                        $target[$fieldName]['created_at'] = $column['created_at'];
                        $target[$fieldName]['updated_at'] = $column['updated_at'];
                    }
                }
                // dd($target);

                $prev = WebAd::first();
                if (!empty($prev)) {
                    WebAd::truncate();
                }

                if (WebAd::insert($target)) {
                    // Session::flash('success', "Advertisement Updated Successfully!");
                    return redirect()->back();
                } else {
           
                    return redirect()->back();
                }

        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function fileUploader(Request $request)
    {
//        dd($request->all());
        $validate = Validator::make(request()->only('file'), [
            'file' => 'required|max:10240',
        ]);
        if ($validate->fails()) {
            return response([
                'status' => 'validation_error',
                'data' => $validate->errors(),
            ], 422);
        }
        try {
            if (request()->has('file')) {
                $folder = $request->folder ?? 'all';
                $image = $request->file('file');
                $imageName = $folder . "/" . time() . '.' . $image->getClientOriginalName();
                if (config('app.env') === 'production') {
                    $image->move('uploads/' . $folder, $imageName);
                } else {
                    $image->move(public_path('/uploads/' . $folder), $imageName);
                }
                $protocol = request()->secure() ? 'https://' : 'http://';

                return response([
                    'status' => 'success',
                    'message' => 'File uploaded successfully',
                    'data' => $protocol . $_SERVER['HTTP_HOST'] . '/uploads/' . $imageName,
                ], 200);
            }
        } catch (\Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


}
