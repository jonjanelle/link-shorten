<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, App\Link, App\User, Auth;

class ShortenController extends Controller

{
    private $symbols = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e',
                'f','g','h','i','j','k','l','m','n','o','p','q','r','s','t',
                'u','v','w','x','y','z','A','B','C','D','E','F','G','H','I',
                'J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X',
                'Y','Z'];

    /*
    * Store new url in database, convert its id number to a base-62 string,
    * and return it to the home view
    */

    public function shorten($source, Request $request)
    {
      $links = null;

      $url = $request->input('link-input');
      if (!$url){
        return view($source)->with(['links'=>$links]);
      }
      $newLink = new Link();
      $newLink->url = $url;
      $newLink->save();
      $newLink->shorturl=$this->idToUrl($newLink->id);
      if (!Auth::guest()){
        $newLink->user()->associate(Auth::user());
      }
      $newLink->save();

      if ($source == 'home'){
        $links = User::find(Auth::user()->id)->links;
        $url = "";
      }
      return view($source)->with(['shortUrl'=>$newLink->shorturl,
                                  'url'=>$url,
                                  'links'=>$links]);
    }

    //encode base-10 id number in base 62.
    public function idToUrl($id){
      $base = 62;

      $maxPow = (int)log($id, $base);
      $res ='';
      for ($i=0; $i<$maxPow+1; $i++){
        $div = pow($base,$maxPow-$i);
        $digit = intdiv($id,$div);
        $id -= $div*$digit;
        $res= $res.$this->symbols[$digit];
      }
      return $res;
    }

    //Convert url to base-62 id number
    public function urlToId($url) {
      $base = 62;

      $res = 0;
      $len = strlen($url);
      for ($i=0; $i<$len; $i++) {
        $char = substr($url, $i, $i+1);
        $res += array_search($char,$this->symbols)*pow($base,$len-$i-1);
      }
      return $res;
    }

    //Given short url code, get original url and redirect
    public function shortRoute($short)
    {
      $id = $this->urlToId($short);
      $url = Link::where('id', $id)->get();
      if (count($url)>0){
        $url[0]->visits+=1;
        $url[0]->save();
        return redirect()->away($url[0]->url);
      } else {
        $errMsg = "Sorry, that link is invalid!";
        return view('shorten')->with(['error'=>$errMsg,
                                      'submitRoute'=>'shorten']);
      }
    }
}
