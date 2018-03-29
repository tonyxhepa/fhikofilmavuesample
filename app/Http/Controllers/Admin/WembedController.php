<?php

namespace App\Http\Controllers\Admin;

use App\Embed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WembedController extends Controller
{
    public function destroy($id)
    {
        $embed = Embed::findOrFail($id);
        $embed->delete();
        return back();
    }
}
