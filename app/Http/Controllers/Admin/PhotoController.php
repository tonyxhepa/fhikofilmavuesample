<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::delete(storage_path('app/public'). $photo->threezerozero);
        Storage::delete(storage_path('app/public'). $photo->fivefivezero);
        Storage::delete(storage_path('app/public'). $photo->thumbnail);

        $photo->delete();
        return back();
    }
}
