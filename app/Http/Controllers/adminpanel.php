<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\category;
use App\Models\product;
use Session;
class adminpanel extends Controller
{
    function login(){
        return view('theme.index');
    }
    // function index(){
    //     return view('admin.adminlogin');
    // }
    public function postlogin(Request $req){
    //     $this->validate($req,[
    //         'password'=>'required|min:2|max:255',
    //         'email'=>'required|email'
    //    ],[
    //        'password.required'=>'password is required',
    //        'email.required'=>'email is required'
    //    ]);
        $email= $req->email;
        $password=sha1($req->password);
        $data=admin::where(['email'=>$email,'password'=>$password])->get();
        if(count($data)>0){
            Session::put('uid',$email);
            return redirect('/admin/dashboard');
        }
        else{
            return redirect('/admin')->with('msg','email or password is not correct');
        }
    }
    function dashboard(){
        return view('admin.dashboard');
    }
    function logout() {
        Session::flash('uid');
        return redirect('/admin');
    }
    function changepass(){
        return view('admin.changepassword');
    }
    function category(){
        $post=category::get();
        return view('admin.category',['postdata'=>$post]);

    }
    function products(){
        $post=product::get();
        return view('admin.products',['postdata'=>$post]);
    }
    function postchangepass(Request $req){
        $op=$req->op;
        $np=$req->np;
        $cp=$req->cp;
        if($np==$cp){
          $sid=Session::get('uid');
          $data=admin::where('email',$sid)->first();
        //   echo $data;
          if($data->password==sha1($op)){
                if($op==$np){
                    return redirect('admin/changepassword')->with('errmsg',
                    'old password and new password is not same');
                }
                else{
                    $data1=admin::find($data->id);
                    $data1->password=sha1($np);
                    if($data1->save()){
                        return redirect('admin/changepassword')->with('succmsg',
                        'password is changed successfully');
                    }
                    else{
                        return redirect('admin/changepassword')->with('errmsg',
                        'something went wrong');
                    }
                }
          }else{
            return redirect('admin/changepassword')->with('errmsg',
            'old password is not correct');
          }
        }else{
            return redirect('admin/changepassword')->with('errmsg',
            'new password and confirm password does not match');
        }
    }
    function addcategory(){
        return view('admin.addcategory');
    }
    function postaddcategory(Request $req){
       $req->validate([
           'cname' =>'required',
           'file'=>'required|mimes:jpg,png,jpeg'
       ]);
       $cname = $req->cname;
       if($req->file()){
           $filename='image-'.rand().'-'.time().'.'.$req->file->getClientOriginalName();
           if($req->file->move(public_path('uploads'), $filename)){
               $ins= new category;
            //    if($ins->cname==$cname){
            //     return redirect('admin/addcategory')->with('errmsg',
            //     'already exist');
            //    }
               $ins->cname = $cname;
               $ins->image=$filename;
               if($ins->save()) {
                   return redirect('admin/category')->with('succmsg',
                   'category saved successfully');
               }
               else{

                   return redirect('admin/addcategory')->with('errmsg',
                   'already exist');

               }
           }
           else{
               echo "file not uploaded";
           }
       }

   }
   function delcat($id){
       $cat=category::find($id);
       if($cat->delete()){
        //    unlink('public/uploads/'.$cat->image);
        return redirect('/admin/category')->with('succmsg',
        'category deleted');
       }
       else{
        return redirect('/admin/category')->with('errmsg',
        'category not deleted');
       }
   }
   function editcat($id){
       $data=category::find($id);

       return view('admin/editcategory',['catdata'=>$data]);
   }
   function editpostcategory(Request $req){
       $cname=$req->cname;
       $cid=$req->cid;

       $catdata=category::find($cid);
       $catdata->cname=$cname;
       if($catdata->save()){
         return redirect('admin/category')->with('succmsg','category updated');
       }
       else{
        return redirect('admin/editcat')->with('errmsg','category not updated');
       }
   }
   function addproducts(){
        $post=category::get();
        return view('admin.addproducts',['postdata'=>$post]);

}
function postaddproducts(Request $req){
   $req->validate([
       'pname' =>'required',
       'file'=>'required|mimes:jpg,png,jpeg'
   ]);
   $pname = $req->pname;
   $cid=$req->cid;
   $price= $req->price;
   $quantity= $req->qty;
   $features = $req->features;
   if($req->file()){
       $filename='image-'.rand().'-'.time().'.'.$req->file->getClientOriginalName();
       if($req->file->move(public_path('uploads'), $filename)){
           $ins= new product;
        //    if($ins->cname==$cname){
        //     return redirect('admin/addcategory')->with('errmsg',
        //     'already exist');
        //    }
           $ins->pname = $pname;
           $ins->cid=$cid;
           $ins->quantity=$quantity;
           $ins->price=$price;
           $ins->features=$features;
           $ins->image=$filename;
           if($ins->save()) {
               return redirect('admin/products')->with('succmsg',
               'product added successfully');
           }
           else{

               return redirect('admin/addproducts')->with('errmsg',
               'already exist');

           }
       }
       else{
           echo "file not uploaded";
       }
   }

}
function editproduct($id){
    $data1=product::get($id);
    $data=category::find($id);

    return view('admin/editproduct',['catdata'=>$data,'catdata1'=>$data1]);
}
function editpostproduct(Request $req){
    $pname=$req->pname;
    $price=$req->price;
    $quantity=$req->qty;
    $features=$req->features;

    $id=$req->id;

    $catdata=category::find($id);
    $catdata->pname=$pname;
    $catdata->price=$price;
    $catdata->quantity=$quantity;
    $catdata->features=$features;
    if($catdata->save()){
      return redirect('admin/product')->with('succmsg','product updated');
    }
    else{
     return redirect('admin/editproduct')->with('errmsg','product not updated');
    }
}
// delete the product method
function delproduct($id){
    $cat=product::find($id);
    if($cat->delete()){
     //    unlink('public/uploads/'.$cat->image);
     return redirect('/admin/products')->with('succmsg',
     'product deleted');
    }
    else{
     return redirect('/admin/products')->with('errmsg',
     'product not deleted');
    }
}
}
