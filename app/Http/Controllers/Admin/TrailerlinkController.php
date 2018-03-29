<?php

namespace App\Http\Controllers\Admin;

use App\Trailerlink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrailerlinkController extends Controller
{
    public function destroy($id)
    {
        $embed = Trailerlink::findOrFail($id);
        $embed->delete();
        return back();
    }
}
