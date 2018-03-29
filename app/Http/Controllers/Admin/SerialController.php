<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateSerialRequest;
use App\Seriale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;

class SerialController extends Controller
{
    public function index()
    {
        //
        $serials = Seriale::all();
        return view('admin.serials.index', compact('serials'));
    }

    public function create()
    {
        return view('admin.serials.create');
    }

    public function store(CreateSerialRequest $request)
    {
        //
        $input = $request->all();

        $serial = Seriale::create($input);

        return redirect('admin/serials/'. $serial->id .'/edit');
    }

    public function edit($id)
    {
        $serials = Seriale::findOrFail($id);

        return view('admin.serials.edit', compact('serials'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->all();

        $serial = Seriale::whereId($id)->first();
        $serial->update($input);
        return redirect('/admin/serials');
    }


    public function destroy($id)
    {
        //
        $serial = Seriale::findOrFail($id);
        $photos = $serial->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $serial->photos()->delete();
        $serial->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/serials');
    }

    public function addEmbed($id, Request $request)
    {
        $serial = Seriale::findOrFail($id);
        $embeds = $serial->embeds();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addShikolinks($id, Request $request)
    {
        $serial = Seriale::findOrFail($id);
        $embeds = $serial->shikolinks();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addShkarkolinks($id, Request $request)
    {
        $serial = Seriale::findOrFail($id);
        $embeds = $serial->shkarkolinks();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addTrailerlinks($id, Request $request)
    {
        $serial = Seriale::findOrFail($id);
        $embeds = $serial->trailerlinks();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addPhoto($id, Request $request)
    {
        $serial = Seriale::findOrFail($id);
        $photos = $serial->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/serialPhoto'))){
            mkdir(storage_path('app/public/serialPhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/serialPhoto/img300'))){
            mkdir(storage_path('app/public/serialPhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/serialPhoto/img550'))){
            mkdir(storage_path('app/public/serialPhoto/img550', 0777, true));
        }
        $path = '/serialPhoto';
        $file->move(storage_path('app/public').$path, $name);
        $threzerozero = Image::make(storage_path('app/public')
            .$path . '/'.$name)->fit(214, 317)->save(storage_path('app/public')
            .$path.'/img300/'.$name);
        $fivefivezero = Image::make(storage_path('app/public')
            .$path . '/'.$name)->fit(550, 425)->save(storage_path('app/public')
            .$path.'/img550/'.$name);

        $photos->create([
            'threezerozero' => "$path/img300/{$name}",
            'fivefivezero' => "$path/img550/{$name}",
            'thumbnail' => "$path/{$name}",
        ]);


    }
}
