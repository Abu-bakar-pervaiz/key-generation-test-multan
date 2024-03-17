<?php

namespace App\Http\Controllers;

use App\Models\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeyController extends Controller
{
    public function add(){
        return view('admin.keys.add');
    }

    public function store( Request $request ){

        $request->validate([
            'quantity' => 'required | numeric | min:1 | max:10000',
            'expiry' => 'required | date',
        ]);
        for ($i=1; $i <= $request->quantity; $i++) { 
            $key = Str::lower(Str::random(4)) . '-' . Str::lower(Str::random(4)) . '-' . Str::lower(Str::random(4));
            Key::create([
                'key' => $key,
                'expiry_date' => $request->expiry,
                'usage_limit' => $request->usage_limit ?? 1,
            ]);
        }
        return back()->with('success','keys generated successfully');
        
    }

    public function check( Request $request ){

        $request->validate([
            'key' => 'required | regex:/^.{4}-.{4}-.{4}$/'
        ]);
        $key = Key::where('key',$request->key)
        ->whereDate('expiry_date','>=',now())
        ->first();
        if( !$key ){
            return back()->with('danger','invalid key given !!!');
        }
        if( $key->status === 0 ){
            return back()->with('danger','this key is deactivated please try with another one !!!');
        }
        $key->decrement('usage_limit');
        if ( $key->usage_limit <= 0 ) {
            $key->update(['status' => 0]);
        }
        return back()->with('success','thank you for varifying the key !!!');
        
    }
}
