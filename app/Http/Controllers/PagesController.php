<?php

 namespace App\Http\Controllers;
 use App\Post;
 use Mail;
 use App\Http\Requests;
 use Session;
 use Illuminate\Http\Request;


class PagesController extends Controller {

  public function getIndex() {
      return view('pages.welcome');
  }

  public function getAbout() {
      return view('pages.about');
  }

  public function getEcommerce() {
      return view('pages.ecommerce');
  }


  /*public function getBlog() {
     $posts = Post::orderBy('created_at', 'asc')->paginate(2);
    // $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
      return view('pages/blog')->withPosts($posts);
  }*/



  public function getContact() {
      return view('pages.contact');
  }

  public function postContact(Request $request) {
    $this->validate($request,
    ['email' => 'required|email',
    'subject' => 'min:3',
    'message' => 'min:10',
    'g-recaptcha-response' => 'required|captcha'
]);

    $data = array(
      'email' =>  $request->email,
      'subject' => $request->subject,
      'bodyMessage' => $request->message  //we can't use message as var as its reseve in Laravel
      //'survey' = ['Q1' => "hello", 'Q2' => 'YES']
    );
    //if we get hit by so many email, we use Mail::queue()
    Mail::send('emails.contact', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('saeidrahmani81@gmail.com');
        $message->subject($data['subject']);
    });

    Session::flash('success', 'Your Email was Sent!');

    //return redirect()->route('home');
    //return redirect()->action('PagesController@getIndex');
    return redirect('contact');



  }

  public function getProject() {
      return view('pages/project');
  }

}

 ?>
