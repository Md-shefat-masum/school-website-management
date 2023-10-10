<?php

namespace App\Http\Controllers;


use App\Models\Navbar\NavbarMenuDetail;
use App\Models\Navbar\NavbarMenuItem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ZipArchive;

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
