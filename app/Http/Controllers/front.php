<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\contact;
use App\Models\User;
class Front extends Controller
{


    public function main()
    {
        $catdata=category::get();
        $prodata=product::orderBy('created_at','desc')
        ->limit(6)
        ->get();
        // dd($prodata);
        return view('front.main',['catdata'=>$catdata],['prodata'=>$prodata]);
    }
    public function contact()
    {
        $catdata=category::get();
        return view('front.contact',['catdata'=>$catdata]);
    }
    public function  catproducts($id)
    {
        $catdata=category::get();
        $prodata=product::where('cid',$id)->get();
        return view('front.catproducts',['catdata'=>$catdata],['prodata'=>$prodata]);
    }

    //login view
    public function login()
    {
        $catdata=category::get();
        return view('front.login',['catdata'=>$catdata]);
    }
    public function postcontact(Request $req)
    {
        //VALIDATON
        $this->validate($req,[
            'name'=>'required|min:4|max:100',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required|min:5|max:255'
        ]);
        $contdata=new contact;
        $contdata->name=$req->name;
        $contdata->email=$req->email;
        $contdata->subject=$req->subject;
        $contdata->message=$req->message;
        if($contdata->save())
        {
            return redirect('/contact')->with('succMsg',"We Will Reach You Shorty Thank you for Contacting");
        }
    }
    function regispost(Request $req)
    {
     $name=$req->logename;
     $email=$req->logemail;

    }
    function loginpost(Request $req)
    {
        return $req;
    }

 }
