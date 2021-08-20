<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GeneralController extends Controller
{
   public function logincontroller(Request $request){

       if ( auth()->attempt([ 'email'=>$request->email, 'password'=> $request->password ]) ){
           request()->session()->regenerate();
           return redirect()->intended('/') ;
       }else{
           $errors = ['email'=>'Xətalı Giriş'];
           return redirect()->route('logincontroller')->withErrors($errors);
       }
   }

   public function logout( Request $request){
       auth()->logout();
       return redirect()->route('logincontroller');
   }

    public function comment(Request $request){

       $data = [
           'user_id'=> auth()->user()->id,
           'post_id'=> $request->postid,
           'content'=>$request->comment
       ];
       DB::table('comments')->insert($data);
       return back();
    }

    public function approve($id){
        $post  = Post::find($id);
        $status = 0;
        if (auth()->user()->role == 1){$status = 3; }
        if (auth()->user()->role == 3){$status = 1; }
        if (auth()->user()->role == 4){$status = 2; }
        if (auth()->user()->role == 6){$status = 4; }
        if (auth()->user()->role == 7){$status = 5; }
        $post->status = $status;
        $post->save();

        return back();
    }

    public function cancel($id){
        $post  = Post::find($id);
        $post->status = -1 ;
        $post->save();

        DB::table('userslogs')->insert([
            'user_id'=>auth()->user()->id,
            'message'=>auth()->user()->name .' tərəfindən '.$post->project_name.' ləğv edildi .']);

        return redirect()->route('account');
    }

    public function account(){
        $posts =DB::table('posts')->where('status','>=',0)->paginate(20);
        return view('account',compact('posts'));
    }


    public function addnewproduct(){
        return view('addnewproduct');
    }

    public function  storenewproduct(Request $request){
        //   var_dump($request->name);
        $post = new Post();
        $post->project_name =  $request->project_name;
        $post->user_id = auth()->user()->id;
        $post->save();
        $post_id = $post->id;

        $data = [] ;

        for($i=0; $i< count($request->name);$i++){

            $rows = [
                'user_id' =>auth()->user()->id,
                'post_id' =>$post_id,
                'name'=> $request->name[$i],
                'destination'=> $request->destination[$i],
                'valley_of_measure'=> $request->valley_of_measure[$i],
                'quantity'=> $request->quantity[$i]];

            if(request()->hasFile('image')  ){
                $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
                $image = $request->file('image')  ;

                $newimagename = rand(99,999).time().'.'.$image[$i]->extension();

                $directory = 'uploads/product/images/'.$post_id.'/';

                $image[$i]->move($directory,$newimagename);
                $rows['image'] = $directory.$newimagename ;
            }
            array_push($data,$rows);

        }//end for


        DB::table('post_products')->insert($data);

        return redirect()->route('account');

    }//end storenewproduct



    public function postdetail($id){
        $post  = Post::find($id);
        $products = DB::table('post_products')->where('post_id',$id)->get();
        $comments = Comment::where('post_id',$id)->get();
        return view('postdetail',compact('post','products','comments'));
    }



    public function addeditproducts($id){
        $post  = Post::find($id);
        $products = DB::table('post_products')->where('post_id',$id)->get();
        if (auth()->user()->role == 4 ){
            return view('anbareditproducts',compact('post','products'));
        }
        return view('addeditproducts',compact('post','products'));
    }

    public function  addstorenewproduct($id,Request $request){
        //   var_dump($request->name);
        $post = Post::find($id);
        $post_id = $id;

        $data = [] ;

        for($i=0; $i< count($request->name);$i++){

            $rows = [
                'user_id' =>auth()->user()->id,
                'post_id' =>$post_id,
                'name'=> $request->name[$i],
                'destination'=> $request->destination[$i],
                'valley_of_measure'=> $request->valley_of_measure[$i],
                'quantity'=> $request->quantity[$i]];

            if(request()->hasFile('image')  ){
                $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
                $image = $request->file('image')  ;

                $newimagename = rand(99,999).time().'.'.$image[$i]->extension();

                $directory = 'uploads/product/images/'.$post_id.'/';

                $image[$i]->move($directory,$newimagename);
                $rows['image'] = $directory.$newimagename ;
            }
            array_push($data,$rows);

        }//end for


        DB::table('post_products')->insert($data);
        DB::table('userslogs')->insert([
            'user_id'=>auth()->user()->id,
            'message'=>auth()->user()->name .' tərəfindən '.$post->project_name.' adlı istəyə yeni məhsullar əlavə edildi .']);
        return redirect()->route('account');

    }//end storenewproduct












    public function voicecontrol(){
       return view('voicecontrol');
    }


    public function savevoice(Request $request){
//      var_dump($request->message);
        $audio = $request->message;
        //$audio = str_replace('data:audio/wav;base64,', '', $audio);
        $decoded = base64_decode($audio);
        $file_location = public_path('voices')."/".time().rand().".wav";
        file_put_contents($file_location, $decoded);

        $data = [
            'post_id' => 1 ,
            'user_id' =>auth()->user()->id,
            'voice' => $file_location
        ];

        DB::table('voices')->insert($data);
    }



}
