<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\livetv;
use App\Models\notice;
use App\Models\prayer;
use App\Models\seo;
use App\Models\social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class settingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function socialSetting()
    {
        $social = DB::table('socials')->first();
        if (empty($social)) {
            $data = [];
            social::create($data);
        }
        $social = DB::table('socials')->first();
        return view('Backend.settings.socials', compact('social'));
    }

    public function updateSocials(Request $request, $id)
    {
        $social = social::findOrFail($id);
        $data['facebook'] = request()->facebook;
        $data['twitter'] = request()->twitter;
        $data['youtube'] = request()->youtube;
        $data['linkedin'] = request()->linkedin;
        $data['instagram'] = request()->instagram;
        $data['linkedin'] = request()->linkedin;
        $social->update($data);
        Toastr::success('Socials Updated Successfully', 'success');
        return view('Backend.settings.socials', compact('social'));
    }

    // Seo Controller
    public function seosSetting()
    {
        $seo = DB::table('seos')->first();
        if (empty($seo)) {
            $data = [];
            seo::create($data);
        }
        $seo = DB::table('seos')->first();
        return view('Backend.settings.seos', compact('seo'));
    }

    public function updateSeos(Request $request, $id)
    {
        $seo = seo::findOrFail($id);
        $data['meta_author'] = request()->meta_author;
        $data['meta_title'] = request()->meta_title;
        $data['meta_keyword'] = request()->meta_keyword;
        $data['meta_description'] = request()->meta_description;
        $data['google_analytics'] = request()->google_analytics;
        $data['google_verification'] = request()->google_verification;
        $data['alexa_analytics'] = request()->alexa_analytics;
        $seo->update($data);
        Toastr::success('Seos Updated Successfully', 'success');
        return view('Backend.settings.seos', compact('seo'));
    }

    // prayer Controller
    public function prayerSetting()
    {
        $prayer = DB::table('prayers')->first();
        if (empty($prayer)) {
            $data = [];
            prayer::create($data);
        }
        $prayer = DB::table('prayers')->first();
        return view('Backend.settings.prayers', compact('prayer'));
    }

    public function updateprayers(Request $request, $id)
    {
        $prayer = prayer::findOrFail($id);
        $data['fajr'] = request()->fajr;
        $data['johor'] = request()->johor;
        $data['asor'] = request()->asor;
        $data['magrib'] = request()->magrib;
        $data['esha'] = request()->esha;
        $data['jummah'] = request()->jummah;
        $prayer->update($data);
        Toastr::success('prayers Updated Successfully', 'success');
        return view('Backend.settings.prayers', compact('prayer'));
    }

    // Live TV Controller
    public function livetvSetting()
    {
        $livetv = DB::table('livetvs')->first();
        if (empty($livetv)) {
            $data = [];
            livetv::create($data);
        }
        $livetv = DB::table('livetvs')->first();
        return view('Backend.settings.livetvs', compact('livetv'));

    }

    public function updatelivetvs(Request $request, $id)
    {
        $livetv = livetv::findOrFail($id);
        $data['embed_code'] = request()->embed_code;
        $livetv->update($data);
        Toastr::success('LiveTv Updated Successfully', 'success');
        return view('Backend.settings.livetvs', compact('livetv'));
    }

    public function Activelivetv($id)
    {
        DB::table('livetvs')->where('id', $id)->update([
            'status' => 1,
        ]);
        Toastr::success('LiveTv Active Successfully', 'success');
        return redirect()->back();
    }

    public function deActivelivetv($id)
    {
        DB::table('livetvs')->where('id', $id)->update([
            'status' => 0,
        ]);
        Toastr::error('LiveTv DeActive Successfully', 'success');
        return redirect()->back();
    }

    // Notices Controller
    public function noticeSetting()
    {
        $notice = DB::table('notices')->first();
        if (empty($notice)) {
            $data = [];
            notice::create($data);
        }
        $notice = DB::table('notices')->first();
        return view('Backend.settings.notices', compact('notice'));
    }

    public function updateNotices(Request $request, $id)
    {
        $notice = notice::findOrFail($id);
        $data['notice'] = request()->notice;
        $notice->update($data);
        Toastr::success('notice Updated Successfully', 'success');
        return view('Backend.settings.notices', compact('notice'));
    }

    public function ActiveNotice($id)
    {
        DB::table('notices')->where('id', $id)->update([
            'status' => 1,
        ]);
        Toastr::success('Notices Active Successfully', 'success');
        return redirect()->back();
    }

    public function deActiveNotice($id)
    {
        DB::table('notices')->where('id', $id)->update([
            'status' => 0,
        ]);
        Toastr::error('Notices DeActive Successfully', 'success');
        return redirect()->back();
    }
}
