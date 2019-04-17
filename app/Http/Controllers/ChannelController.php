<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function create()
    {
        return view('channels.create_channels');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        $channels = Channel::create([
           'name' => request('name'),
            'slug' => request('slug')
        ]);

        return back();
    }
}
