<?php

namespace App\Http\Controllers;

use App\Models\Navbar\NavbarMenu;
use App\Models\Navbar\NavbarMenuDetail;
use App\Models\Navbar\NavbarMenuItem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ZipArchive;

class WebsiteController extends Controller
{
    public function all_employee()
    {
        $navbar_menu = NavbarMenu::where('title', "একাডেমিক প্রশাসন")->first();
        if ($navbar_menu) {
            // $employee = NavbarMenuDetail::where('navbar_menu_id', $navbar_menu->id)->orderBy('id','DESC')->get();
            $sub_menus = NavbarMenuItem::where('navbar_menus_id', $navbar_menu->id)->get();
            return view('frontend.pages.employee.all-employee', compact('navbar_menu', 'sub_menus'));
        }
    }

    public function group_employee($category)
    {
        $navbar_menu = NavbarMenu::where('title', "একাডেমিক প্রশাসন")->first();
        if ($navbar_menu) {
            // $employee = NavbarMenuDetail::where('navbar_menu_id', $navbar_menu->id)->orderBy('id','DESC')->get();
            $sub_menus = NavbarMenuItem::where('navbar_menus_id', $navbar_menu->id)->get();
            return view('frontend.pages.employee.all-employee', compact('navbar_menu', 'sub_menus'));
        }
    }

    public function all_notice()
    {
        $navbar_menu = NavbarMenu::where('title', "নোটিশ")->first();
        if ($navbar_menu) {
            // $notice = NavbarMenuDetail::where('navbar_menu_id', $navbar_menu->id)->orderBy('id','DESC')->get();
            $sub_menus = NavbarMenuItem::where('navbar_menus_id', $navbar_menu->id)->get();
            return view('frontend.pages.notice.notice', compact('navbar_menu', 'sub_menus'));
        }
    }

    public function menu_item_list($pageSlug)
    {
        $navbar_menu_item = NavbarMenuItem::where('slug', $pageSlug)->first();
        if ($navbar_menu_item) {
            $notice = NavbarMenuDetail::where('navbar_menu_items_id', $navbar_menu_item->id)->orderBy('id', 'DESC')->paginate(10);
            if (isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] == "application/json") {
                return view('frontend.pages.notice.notice_list', compact('notice', 'navbar_menu_item'));
            }
            return view('frontend.pages.notice.notice', compact('notice', 'navbar_menu_item'));
        }
    }

    public function getNoticeDetailsBynoticeId($slug, $id)
    {
        $noticeDetails = NavbarMenuDetail::where('id', $id)->orderBy('id', 'DESC')->first();
        return view('frontend.pages.notice.notice_detailse', compact('noticeDetails'));
    }

    public function pageDetails($pageSlug)
    {
        $navbar_menu_item = NavbarMenuItem::where('slug', $pageSlug)->first();
        if ($navbar_menu_item) {
            if ($navbar_menu_item->is_multiple) {
                return redirect()->route('menu_item_list', [$navbar_menu_item->slug]);
            }
            $pageDetails = NavbarMenuDetail::where('navbar_menu_items_id', $navbar_menu_item->id)->orderBy('id', 'DESC')->first();
            return view('frontend.pages.page-details', compact('pageDetails', 'navbar_menu_item'));
        }
    }

    public function databaseBackup()
    {
        Artisan::call('app:backup');
        $publicFolderPath = public_path('uploads');
        $zip = new ZipArchive;
        $zipFileName = 'images.zip';
        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            $files = File::allFiles($publicFolderPath);
            foreach ($files as $file) {
                $zip->addFile($file->getPathname(), $file->getRelativePathname());
            }
            $zip->close();
            return response()->download($zipFileName)->deleteFileAfterSend(true);
        } else {
            return redirect()->back()->with('error', 'Failed to create the zip file.');
        }
    }
}
