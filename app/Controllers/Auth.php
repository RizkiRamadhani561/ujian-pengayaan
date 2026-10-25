<?php
namespace App\Controllers;
class Auth extends BaseController {
 public function index()
{
if(session()->get('user')) return redirect()->to(site_url('dashboard'));
return view('auth/login',['title'=>'Masuk']);
}

public function attempt()
{
if(!$this->validate(['email'=>'required|valid_email|max_length[190]','password'=>'required|max_length[255]'])) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
$email=strtolower(trim((string)$this->request->getPost('email')));
$password=(string)$this->request->getPost('password');
$user=db_connect()->table('users')->where('email',$email)->where('is_active',1)->get()->getRowArray();
if(!$user||!password_verify($password,$user['password'])) return redirect()->back()->withInput()->with('loginError','Email atau password tidak sesuai.');
session()->regenerate(true);
session()->set('user',['id'=>(int)$user['id'],'name'=>$user['name'],'email'=>$user['email'],'role'=>$user['role']]);
return redirect()->to(site_url('dashboard'))->with('success','Selamat datang, '.$user['name'].'.');
}

public function logout()
{
session()->remove('user');
session()->regenerate(true);
return redirect()->to(site_url('login'))->with('success','Kamu sudah keluar dari aplikasi.');
}
}
