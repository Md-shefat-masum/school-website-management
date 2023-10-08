<?php

namespace App\Http\Controllers;

use App\Models\Gallery\GalleryPhoto;
use App\Models\Gallery\GalleryVideo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getAllGalleryPhotos()
    {
        $galleryPhotos = GalleryPhoto::with('gallery_photo_categories')->latest()->paginate(5);
        return view('frontend.pages.gallery.photo', compact('galleryPhotos'));
    }

    public function getAllGalleryVideos()
    {
        $galleryVideos = GalleryVideo::with('gallery_video_categories')->latest()->paginate(5);
        return view('frontend.pages.gallery.video', compact('galleryVideos'));
    }
}
