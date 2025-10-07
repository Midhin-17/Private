<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        // Birthday page
        $birthdayDate = '2025-10-07 11:30:00';
        return view('home', compact('birthdayDate'));
    }

    public function videos()
    {
        $videoPath = public_path('videos');
        $videos = [];

        if (File::exists($videoPath)) {
            foreach (File::files($videoPath) as $file) {
                $ext = strtolower($file->getExtension());
                if (in_array($ext, ['mp4', 'webm', 'ogg'])) {
                    $videos[] = '/videos/' . $file->getFilename();
                }
            }
        }

        return view('extra.videos', compact('videos'));
    }
public function images()
{
   $imagePath = public_path('images/polaroids'); // folder inside public/
    $images = [];

    if (File::exists($imagePath)) {
        foreach (File::files($imagePath) as $file) {
            $ext = strtolower($file->getExtension());
            if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                $images[] = '/images/polaroids/' . $file->getFilename();
            }
        }
    }

    return view('welcome', compact('images'));
}



}
