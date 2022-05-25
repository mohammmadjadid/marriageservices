<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\blog_details;
use App\Models\categorys;
use App\Models\statistics;
use App\Models\testimonial;
use App\Models\messages;
use App\Models\faq_language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePage extends Controller
{

    public  function  index()
    {
        $languageId = 1;
        $services = blog::getServices($languageId);
        $statistics = statistics::getAll($languageId);
        $blogs = blog::get_details();
        $testimonials = testimonial::getAll($languageId);
        return view('website.home',compact(['services','statistics','blogs','testimonials']));
    }

    public  function  services()
    {
        $languageId = 1;
        $services = categorys::getActive($languageId);
        return view('website.services',compact(['services']));
    }

    public  function  blogs($id = null)
    {
        $languageId = 1;
        $blogs = blog::getAll($languageId,$id);
        $category = null;
        if($id)
        {
            $category = categorys::with_language($id);
        }
        return view('website.blogs',compact(['blogs','category']));
    }

    public  function  blog($id)
    {
        $languageId = 1;
        $blog = blog_details::getByLanguage($id , $languageId);
        $mainBlog = blog::find($blog->blog_id);
        $blog->category_id = $mainBlog->category_id;
        $related_blogs = blog::get_details($mainBlog->category_id , $languageId)->toArray();
        // $related_blogs = array_map(function ($row) { if($row['is_active']) return $row;} , $related_blogs);
        $related_blogs = array_filter($related_blogs, function($value) { return $value['is_active']; });
        $services = null;
        if($blog->category_id)
        {
            $services = blog::getServices($languageId);
        }
        return view('website.blog',compact(['blog','related_blogs','services']));
    }

    public  function  contact()
    {
        return view('website.contact');
    }

    public  function sendMessage(Request  $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $message  = new messages;
        $message->customer_name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->msg_subject;
        $message->text = $request->message;
        $message->save();
        Session::flash('message', 'تم الإرسال بنجاح');
        return redirect('contact');
    }

    public function about()
    {
        return view('website.about');
    }

    public function faq()
    {
        $languageId = 1;
        $questions = faq_language::join('faqs','faqs.id','=','faq_languages.faq_id')
        ->select('faq_languages.*','faqs.is_active')
        ->where(['language_id' => $languageId , 'is_active'=>true])->get();
        return view('website.faq',compact(['questions']));
    }


    public function search()
    {
        $blog_details = blog_details::search(request('search'));
         return response()->json($blog_details, 200,[]);
    }
}
