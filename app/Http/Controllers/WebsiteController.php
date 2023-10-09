<?php

namespace App\Http\Controllers;


use App\Models\Navbar\NavbarMenuDetail;
use App\Models\Navbar\NavbarMenuItem;
use App\Models\News\News;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function getNoticeBynoticeId($id)
    {
        $notice = NavbarMenuDetail::where('navbar_menu_items_id', $id)->get();
        return view('frontend.pages.notice.notice', compact('notice'));
    }

    public function getNoticeDetailsBynoticeId($id)
    {
        $noticeDetails = NavbarMenuDetail::where('id', $id)->first();
        return view('frontend.pages.notice.notice_detailse', compact('noticeDetails'));
    }

    public function pageDetails($pageSlug)
    {
        $query = NavbarMenuItem::where('slug', $pageSlug)->first();
        if ($query) {
            $pageDetails = NavbarMenuDetail::where('navbar_menu_items_id', $query->id)->first();
            return view('frontend.pages.page-details', compact('pageDetails'));
        }
    }
}
