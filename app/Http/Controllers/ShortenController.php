<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, App\Link;

class ShortenController extends Controller
{
    public function shorten(Request $request)
    {
      $url = $request->input('link-input');
      $newLink = new Link();
      $newLink->url = $url;
      $newLink->save();
      $shortUrl=$this->idToUrl($newLink->id);
      return view('home')->with(['message'=>"Link creation successful!",
                                 'shortUrl'=>$shortUrl]);
    }

    //encode id number in base 62.
    //TO DO: add ability to specify base
    public function idToUrl($id){

      $base = 62;
      $symbols = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e',
                  'f','g','h','i','j','k','l','m','n','o','p','q','r','s','t',
                  'u','v','w','x','y','z','A','B','C','D','E','F','G','H','I',
                  'J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X',
                  'Y','Z'];

      $maxPow = (int)log($id, $base);
      $res ='';
      for ($i=0; $i<$maxPow+1; $i++){
        $div = pow($base,$maxPow-$i);
        $digit = intdiv($id,$div);
        $id -= $div*$digit;
        $res= $res.$symbols[$digit];
      }
      return $res;
    }

    public function urlToId($url) {
      $base = 62;
      $symbols = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e',
                  'f','g','h','i','j','k','l','m','n','o','p','q','r','s','t',
                  'u','v','w','x','y','z','A','B','C','D','E','F','G','H','I',
                  'J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X',
                  'Y','Z'];

      $res = 0;
      $len = strlen($url);
      for ($i=0; $i<$len; $i++) {
        $char = substr($url, $i, $i+1);
        $res += array_search($char,$symbols)*pow($base,$len-$i-1);
      }
      return $res;
    }


    public function shortRoute($short)
    {
      $id = $this->urlToId($short);
      $url = Link::where('id', $id)->get();
      return redirect()->away($url[0]->url);
    }
}
