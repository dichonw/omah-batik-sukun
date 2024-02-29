<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ArticleModel;
use App\Models\Users;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public function index(){
        return View('adminLayout.index');
    }

    public function login()
    {
        return view('adminLayout.contents.auth.login');
    }

    public function action_login(Request $request){
        $users = Users::where('username', $request->username)->first();

        if ($users == null) {
            return redirect()->back()
            ->with('error', 'Username tidak ada!');
        }

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);
        // dd($hashed_password);

        if ($hashed_password) {
            $users->token = Str::random(20);
            $users->save();
            $request->session()->put('token', $users->token);
            $request->session()->put('username', $users->username);
            $request->session()->put('name_user', $users->name_user);
            return to_route('dashboard');
        } else {
            return redirect()->back()
            ->with('error', 'Maaf, data yang anda masukan kurang sesuai!');
        }
    }

    public function action_logout(Request $request){
        Users::where('token', $request->token)->update([
            'token' => NULL
        ]);

        Session::pull('token');
        return to_route('index');
    }

    public function dashboard(){
        if (Session::has('token')) {
            $users = Users::where('token', Session::get('token'))->first();
            $dataProduct = ProductModel::all();
            $dataArticle = ArticleModel::all();
            $dataAdmin = Users::all();
            return view('adminLayout.contents.dashboard', [
                'dataProduct' => $dataProduct,
                'dataArticle' => $dataArticle,
                'dataAdmin' => $dataAdmin
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function admins(){
        $dataAdmins = Users::all();
        return view('adminLayout.contents.admins', [
            'dataAdmins' => $dataAdmins
        ]);
    }

    public function product(){
        $dataProduct = ProductModel::all();
        return view('adminLayout.contents.product', [
            'dataProduct' => $dataProduct
        ]);
    }

    public function article(){
        $dataArticle = ArticleModel::all();
        return view('adminLayout.contents.article', [
            'dataArticle' => $dataArticle
        ]);
    }

    public function form_admin(){
        return view('adminLayout.contents.add.addNewAdmin');
    }

    public function create_admin(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:6|unique:Users',
            'name_user' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'],[
                'username.required' => 'Kolom username wajib diisi.',
                'username.unique' => 'Username yang anda masukan sudah tersedia.',
                'username.min' => 'Username setidaknya harus berisi 6 karakter',
                'name_user.required' => 'Kolom Nama Admin wajib diisi.',
                'password.min' => 'Password setidaknya harus berisi 6 karakter',
                'password.same' => 'Password dan Konfirmasi password yang dimasukan harus sama.',
                'password_confirmation.min' => 'Konfirmasi Password setidaknya harus berisi 6 karakter',
        ]);

        $current_date_time = date('Y-m-d H:i:s');

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $created = Users::create([
                "username" => $request->username,
                "name_user" => $request->name_user,
                "password" => bcrypt($request->password),
                "created_at" => $current_date_time,
            ]);
        }

        if ($created) {
            return redirect('/admin/list_admin')
            ->with('flash_message', 'Admin Baru Berhasil Ditambahkan!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect('/admin/list_admin')
            ->with('flash_message', 'Admin Baru Gagal Ditambahkan!')
            ->with('flash_type', 'alert alert-danger');
        }
    }

    public function delete_admin($id){
        // Delete data in database
        $delete_admin = Users::where('id',$id)->delete();

        if ($delete_admin) {
            return redirect()->back()
            ->with('flash_message', 'Admin Berhasil Dihapus!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect()->back()
            ->with('flash_message', 'Admin Gagal Dihapus!')
            ->with('flash_type', 'alert alert-danger');
        }
        return redirect()->back();
    }

    public function update_admin($id){
        $dataAdmins = Users::where('id',$id)->get();
        return view('adminLayout.contents.edit.editAdmins', [
            'dataAdmins' => $dataAdmins
        ]);
    }

    public function edit_admin(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:6',
            'name_user' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'],[
                'username.required' => 'Kolom username wajib diisi.',
                'username.min' => 'Username setidaknya harus berisi 6 karakter',
                'name_user.required' => 'Kolom Nama Admin wajib diisi.',
                'password.min' => 'Password setidaknya harus berisi 6 karakter',
                'password.same' => 'Password dan Konfirmasi password yang dimasukan harus sama.',
                'password_confirmation.min' => 'Konfirmasi Password setidaknya harus berisi 6 karakter',
        ]);

        $current_date_time = date('Y-m-d H:i:s');

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $admin = Users::where('id',$request->id)->update([
                "username" => $request->username,
                "name_user" => $request->name_user,
                "password" => bcrypt($request->password),
                "updated_at" => $current_date_time,
            ]);
        }

        if ($admin) {
            return redirect('/admin/list_admin')
            ->with('flash_message', 'Admin Berhasil Diubah!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect('/admin/list_admin')
            ->with('flash_message', 'Admin Gagal Diubah!')
            ->with('flash_type', 'alert alert-danger');
        }
    }

    public function create_product(Request $request){
        // Validasi request
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Save Image to directory
        $file = $request->file('image');
        $namaFile = $file->getClientOriginalName();
        $file->move('assets/img/product',$file->getClientOriginalName());

        $product = ProductModel::create([
            'product_name' => $request->product_name,
            'image' => $namaFile,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
        ]);

        $product->save();

        if ($product) {
            return redirect()->back()
            ->with('flash_message', 'Produk Baru Berhasil Ditambahkan!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect()->back()
            ->with('flash_message', 'Produk Baru Gagal Ditambahkan!')
            ->with('flash_type', 'alert alert-danger');
        }
    }

    public function delete_product($id){
        // Delete file in directory
        $gambar = ProductModel::where('id',$id)->first();
        File::delete('assets/img/product/'.$gambar->image);

        // Delete data in database
        $delete_product = ProductModel::where('id',$id)->delete();

        if ($delete_product) {
            return redirect()->back()
            ->with('flash_message', 'Produk Berhasil Dihapus!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect()->back()
            ->with('flash_message', 'Produk Gagal Dihapus!')
            ->with('flash_type', 'alert alert-danger');
        }
        return redirect()->back();
    }

    public function update_product($id){
        $dataProduct = ProductModel::where('id',$id)->get();
        return view('adminLayout.contents.edit.editProduct', [
            'dataProduct' => $dataProduct
        ]);
    }

    public function edit_product(Request $request){
        $product = ProductModel::find($request->id);
        $namaFileDatabase = $product->image;

        // Mendapatkan nama file yang diunggah, jika ada
        $uploadedFile = $request->file('image');
        $uploadedFileName = null;

        if ($uploadedFile) {
            $uploadedFileName = $uploadedFile->getClientOriginalName();
        }

        // Validasi hanya jika file diunggah dan nama file tidak sama dengan nama file di database
        if ($uploadedFileName && $namaFileDatabase !== $uploadedFileName) {
            // Validasi file baru yang diunggah
            $validator = Validator::make($request->all(), [
                'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'image.required' => 'Gambar Wajib diisi',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            // Jika validasi berhasil, gunakan nama file yang baru diunggah
            $namaFile = $uploadedFileName;

            // Pindahkan file baru ke direktori
            $uploadedFile->move('assets/img/product', $namaFile);

            // Hapus file lama jika ada
            if ($namaFileDatabase && File::exists('assets/img/product/'.$namaFileDatabase)){
                File::delete('assets/img/product/'.$namaFileDatabase);
            }
        } else {
            // Jika tidak ada file baru yang diunggah, gunakan nama file dari database
            $namaFile = $namaFileDatabase;
        }

        // Update data artikel
        $product->update([
            'product_name' => $request->product_name,
            'image' => $namaFile,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
        ]);

        if ($product) {
            return redirect('/admin/product')
            ->with('flash_message', 'Produk Berhasil Diubah!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect('/admin/product')
            ->with('flash_message', 'Produk Gagal Diubah!')
            ->with('flash_type', 'alert alert-danger');
        }
    }

    public function create_article(Request $request){
        // Validasi request
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Save Image to directory
        $file = $request->file('image');
        $namaFile = $file->getClientOriginalName();
        $file->move('assets/img/article',$file->getClientOriginalName());

        $article = ArticleModel::create([
            'article_title' => $request->article_title,
            'image' => $namaFile,
            'description' => $request->description,
            'optional_link' => $request->optional_link,
        ]);

        $article->save();

        if ($article) {
            return redirect()->back()
            ->with('flash_message', 'Artikel Baru Berhasil Ditambahkan!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect()->back()
            ->with('flash_message', 'Artikel Baru Gagal Ditambahkan!')
            ->with('flash_type', 'alert alert-danger');
        }
    }

    public function delete_article($id){
        // Delete file in directory
        $gambar = ArticleModel::where('id',$id)->first();
        File::delete('assets/img/article/'.$gambar->image);

        // Delete data in database
        $delete_article = ArticleModel::where('id',$id)->delete();

        if ($delete_article) {
            return redirect()->back()
            ->with('flash_message', 'Artikel Berhasil Dihapus!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect()->back()
            ->with('flash_message', 'Artikel Gagal Dihapus!')
            ->with('flash_type', 'alert alert-danger');
        }
        return redirect()->back();
    }

    public function update_article($id){
        $dataArticle = ArticleModel::where('id',$id)->get();
        return view('adminLayout.contents.edit.editArticle', [
            'dataArticle' => $dataArticle
        ]);
    }

    public function edit_article(Request $request){
        $article = ArticleModel::find($request->id);
        $namaFileDatabase = $article->image;

        // Mendapatkan nama file yang diunggah, jika ada
        $uploadedFile = $request->file('image');
        $uploadedFileName = null;

        if ($uploadedFile) {
            $uploadedFileName = $uploadedFile->getClientOriginalName();
        }

        // Validasi hanya jika file diunggah dan nama file tidak sama dengan nama file di database
        if ($uploadedFileName && $namaFileDatabase !== $uploadedFileName) {
            // Validasi file baru yang diunggah
            $validator = Validator::make($request->all(), [
                'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'image.required' => 'Gambar Wajib diisi',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            // Jika validasi berhasil, gunakan nama file yang baru diunggah
            $namaFile = $uploadedFileName;

            // Pindahkan file baru ke direktori
            $uploadedFile->move('assets/img/article', $namaFile);

            // Hapus file lama jika ada
            if ($namaFileDatabase && File::exists('assets/img/article/'.$namaFileDatabase)){
                File::delete('assets/img/article/'.$namaFileDatabase);
            }
        } else {
            // Jika tidak ada file baru yang diunggah, gunakan nama file dari database
            $namaFile = $namaFileDatabase;
        }

        // Update data artikel
        $article->update([
            'article_title' => $request->article_title,
            'image' => $namaFile,
            'description' => $request->description,
            'optional_link' => $request->optional_link,
        ]);

        if ($article) {
            return redirect('/admin/article')
            ->with('flash_message', 'Artikel Berhasil Diubah!')
            ->with('flash_type', 'alert alert-success');
        } else {
            return redirect('/admin/article')
            ->with('flash_message', 'Artikel Gagal Diubah!')
            ->with('flash_type', 'alert alert-danger');
        }
    }
}
