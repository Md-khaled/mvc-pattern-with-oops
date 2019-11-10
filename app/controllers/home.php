<?php 
class Home extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user=$this->model('User');
    }
    public function index($name='')
    {
        //$this->model('user');
        $user=$this->user;
        $user->name=$name;
        echo $user->name;
        $this->view('home/user',$user->name);
    }
    public function create($username='',$email='')
    {
        echo $username;
        /*
        $this->user->create([
            'name'=>$username,
            'email'=>$email
        ]);
        */
        User::create([
            'name'=>$username,
            'email'=>$email
        ]);
    }
    public function test()
    {
        echo('test purpose');
    }
}

?>