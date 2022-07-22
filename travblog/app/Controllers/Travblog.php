<?php

namespace App\Controllers;
use App\Models\Travmodel;
use App\Libraries\Hash;

class Travblog extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    public function register()
    {
        return view('register');
    }
    public function create_user()
    {
        if($this->request->getMethod()=='post')
        {
            $validation=$this->validate([
                'name'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'name is required',
                    ],
                ],
                'email'=>[
                    'rules'=>'required|valid_email|is_unique[user.email]',
                    'errors'=>[
                        'required'=>'email is required',
                        'valid_email'=>'enater valid email',
                        'is_unique'=>'email is already registered'
                    ],
                ],
                'password'=>[
                    'rules'=>'required|min_length[8]|max_length[12]',
                    'errors'=>[
                        'required'=>'password is required',
                        'min_length'=>'password should minimum 8 characters',
                        'max_length'=>'password should maximun 12 characters ',
                    ],
                ],
                'cpassword'=>[
                    'rules'=>'required|matches[password]',
                    'errors'=>[
                        'required'=>'name is required',
                        'matches'=>'confirm password not match with passowrd',
                    ],
                ],
            ]);
            if(!$validation)
            {
                return view('register',["validation"=>$this->validator]);
            
            }
            else
            {
                $mymodel=new Travmodel();

                $name=$this->request->getVar('name');
                $email=$this->request->getVar('email');
                $password=$this->request->getVar('password');
                
                $userdata=[
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>Hash::make($password),
                ];
                $mymodel->insert($userdata);
                return redirect()->to('register')->with('success','Account created successfully');
                echo "success";
            }
        }
        else
        {
            echo "something went wrong.....";
        }
    }
    public function login()
    {
        return view('login');
    }
    public function check_user()
    {
        $mymodel=new Travmodel();
        if($this->request->getMethod() == 'post')
        {
            $validation=$this->validate([
                'email'=>[
                    'rules'=>'required|valid_email|is_not_unique[user.email]',
                    'errors'=>[
                        'required'=>'email is required',
                        'valid_email'=>'enater valid email',
                        'is_not_unique'=>'this email is not registered'
                    ],
                ],
                'password'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'password is required'
                    ]
                ],
            ]);

            if(!$validation)
            {
                return view('login',['validation'=>$this->validator]);
                
            }
            else
            {
                $email=$this->request->getVar('email');
                $password=$this->request->getVar('password');
                $user=$mymodel->where('email',$email)->first();
                $chech_password=Hash::check($password,$user['password']);

                if(!$chech_password)
                {
                    session->setFlashdata('fail','password in wrong');
                    return redirect()->to('login')->withInput();
                }
                else
                {
                    $data=[
                        'id'=>$user['id'],
                        'name'=>$user['name'],
                        'email'=>$user['email'],
                        'isloggedin'=>true,
                    ];
                    session()->set($data);
                    return redirect()->to('blogs');
                }
            }
        }
    }
    public function createblogpage()
    {
        return view('createblogpage');
    }
    public function createblog()
    {
        if($this->request->getMethod() == 'post')
        {
            $db=\Config\Database::connect();
            $myblog=$db->table('blog');
            $id=session()->get('id');
            $title=$this->request->getVar('title');
            $content=$this->request->getVar('content');
            $data=[
                "userid"=>$id,
                "title"=>$title,
                "content"=>$content,
            ];
            $myblog->insert($data);
            return redirect()->to('blogs');
        }
    }
    public function editblogpage($id)
    {
        $db=\Config\Database::connect();
        $model=$db->table('blog');
        $data['blog']=$model->where('id',$id)->get()->getRowArray();
        return view('editblogpage',$data);
    }
    public function editblog()
    {
            $id=$this->request->getVar('id');
            $title=$this->request->getVar('title');
            $content=$this->request->getVar('content');
            $data=[
                "title"=>$title,
                "content"=>$content,
            ];
            $db=\Config\Database::connect();
            $model=$db->table('blog');
            $model->set($data)->where('id',$id)->update();
        
            return redirect()->to('blogs');
    }
    public function blogs()
    {
        $db=\Config\Database::connect();
        $blogs=$db->table('blog');
        $data['allblogs']=$blogs->get()->getResultArray();
        return view('blogs',$data);
    }
    public function viewblog($id)
    {
       
        $db=\Config\Database::connect();
        $getblog=$db->table('blog');
        $data['blog']=$getblog->where('id',$id)->get()->getRowArray();
        return view('viewblog',$data);
    }
    public function profile()
    {
        $id=session()->get('id');
        $name=session()->get('name');
        $email=session()->get('email');
        $db=\Config\Database::connect();
        $myblogs=$db->table('blog')->select('blog.id,blog.title')->join('user','user.id=blog.userid')->where('user.id',$id);
        $data['blogs']=$myblogs->get()->getResultArray();
        $user['data']=[
            'name'=>$name,
            'email'=>$email,
        ];
        return view('profile',array_merge($user,$data));
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
    public function aboutus()
    {
        return view("aboutus");
    }
}
?>