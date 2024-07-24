<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ArticleModel;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

class LandingpageController extends Controller
{
    public function index(){
        $dataProduct = ProductModel::paginate(8);
        $dataArticle = ArticleModel::paginate(3);
        return view('landingpage.index', [
            'dataProduct' => $dataProduct,
            'dataArticle' => $dataArticle
        ]);
    }

    public function detail_product($id){
        $dataProduct = ProductModel::where('id',$id)->get();
        $dataOtherProduct = ProductModel::paginate(4);
        return view('landingpage.contents.detailProduct', [
            'dataProduct' => $dataProduct,
            'dataOtherProduct' => $dataOtherProduct
        ]);
    }

    public function detail_article($id){
        $dataArticle = ArticleModel::where('id',$id)->get();
        return view('landingpage.contents.detailArticle', [
            'dataArticle' => $dataArticle,
        ]);
    }

    public function send_mail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to($request->email)->send(new MailSend($details));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
