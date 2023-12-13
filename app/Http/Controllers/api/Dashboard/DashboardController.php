<?php

namespace App\Http\Controllers\api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Employee\Employee;
use App\Models\Gallery\GalleryPhoto;
use App\Models\Gallery\GalleryVideo;
use App\Models\Navbar\NavbarMenuDetail;
use App\Models\News\News;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function at_a_glance()
    {
        $at_a_glance = [];

        $at_a_glance['employees'] = Employee::count();
        $at_a_glance['students'] = User::where('role_sl',3)->count();
        $at_a_glance['photos'] = GalleryPhoto::count();
        $at_a_glance['videos'] = GalleryVideo::count();

        $at_a_glance['blogs'] = Blog::count();
        $at_a_glance['news'] = News::count();
        $at_a_glance['notice'] = NavbarMenuDetail::where('navbar_menu_id',7)->count();

        return response()->json($at_a_glance);
    }
}
