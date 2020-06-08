<?php

namespace App\Http\Controllers;

use App\Cipher;
use Illuminate\Http\Request;

class CipherController extends Controller
{
    public function index(Request $request)
    {
        return view('decoder');
    }

    // public function show($id)
    // {
    //     $cipher = Cipher::find($id);

    //     return view('decoder')->with('cipher',$cipher);
    // }

    public function store(Request $request)
    {
        $cipher = Cipher::create($request->all());

        $cipher_string = $request->cipher;
        
        $shift = $request->shift_number;
        $decode = $request->decode_option;
        //Decoding/Encoding logic
        $alpha = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $cipher_string = strtolower($cipher_string);
        $res = "";
        if($decode){
            for ($i=0; $i < strlen($cipher_string); $i++) { 
                $index = array_search($cipher_string[$i],$alpha);
                $decoded_char_index = ($shift + $index > 26) ? ($shift + $index) % 26 : $index + $shift ;
                if($decoded_char_index > 26) {$decoded_char_index %= 26;}
                if($decoded_char_index < 0) {while($decoded_char_index > 0) $decoded_char_index+= 26;}

                $res .= $alpha[$decoded_char_index];
            }
        } else{
            for ($i=0; $i < strlen($cipher_string); $i++) { 
                $index = array_search($cipher_string[$i],$alpha);
                $decoded_char_index = ($index > $shift) ? $index - $shift: $index - $shift + 26;
                if($decoded_char_index > 26) {$decoded_char_index %= 26;}
                if($decoded_char_index < 0) {while($decoded_char_index > 0) $decoded_char_index+= 26;}

                $res .= $alpha[$decoded_char_index];
            }
        }
        
        return response()->json([
            'res'  => $res
        ], 200);
    }
}
