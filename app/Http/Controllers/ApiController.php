<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
class ApiController extends Controller
{
    public function all()
    {
        return Post::all();
    }

    public function getname(Request $request)
    {
        return Post::where("name", "LIKE", '%'.$request->name.'%')->get();
    }

    public function random3()
    {
        return Post::orderByRaw("RAND()")->limit(3)->get();
    }

    public function lastblogs()
    {
        return Post::latest()->take(4)->get();
    }

    public function DelPost($id)
    {
        Post::destroy($id);
        return redirect("/Admin");
    }

    public function allusers()
    {
        return User::all();
    }

    public function DelUser($id)
    {
        User::destroy($id);
        return redirect("/Admin/user");
    }
    public function createUser(Request $request)
    {
        $user = User::create($request->validate([
            'name' => ["required", "string"],
            'email' => ["required", "string", "email"],
            "password" => ["required", "string"]
        ]));
        return $user;
    }

    public function UpdateUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route("user.edit",$user);
    }

    public function createPost(Request $request)
    {
        $post = Post::create($request->validate([
            'user_id' => ["required", "integer"],
            'name' => ["required", "string"],
            "body" => ["required", "string"],
            "img" => ["required","string"],
            "slug" => ["required","string"]
        ]));
        
        return redirect()->route("auth.index");
    }

    public function getcomments($slug)
    {
        $id = Post::where("slug", $slug)->get();
        $query =  Comment::select("comments.user_id","comments.id","comments.comment","users.email","comments.created_at","comments.post_id")->join("users", "comments.user_id", "=", "users.id")->where("post_id", $id[0]['id'])->get();
        return $query;
    }

    public function createcomment(Request $request)
    {
       Comment::create($request->validate([
            'user_id' => ["required", "integer"],
            'comment' => ["required", "string"],
            "post_id" => ["required", "integer"],
        ]));
        $this->SendMail();
        return back();
    }

    public function destroycomment($id)
    {
        Comment::destroy($id);
        
        return back();
    }

    private function SendMail()
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
 
        try {
 
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.test.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'username';   //  sender username
            $mail->Password = "*****";       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465
 
            $mail->setFrom('alan.guzman@busman.com.mx', 'SenderName');
 
            $mail->addReplyTo('alan.guzman@busman.com.mx', 'SenderReplyName');
 
            $mail->isHTML(true);                // Set email content format to HTML
 
            $mail->Subject = "New Post";
            $mail->Body    = "New comment is created";
 
 
            if( !$mail->send() ) {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            
            else {
                return back()->with("success", "Email has been sent.");
            }
 
        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }
}
