<?php include_once './Core/Controller.php';
class LoginController extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
        $this->index();
    }

    public function index ()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'show';
        switch($method) {
            case 'show':
                include_once './views/login.php';
                break;    
            case 'check':
                if(isset($_POST['submit_login'])) {
                    $error['email'] = '';
                    $error['password'] = '';
                    $flag = 0;
                    // Validate email
                    if(empty($_POST['email']))
                        $error['email'] = '(Vui lòng nhập email)';
                    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                        $error['email'] = '(Email không hợp lệ)';
                    else
                        $email = trim($_POST['email']);
                        $flag = 1;

                    // Validate password
                    if(empty($_POST['password']))
                        $error['password'] = '(Vui lòng nhập mật khẩu)';
                    else
                        $password = trim($_POST['password']);
                    
                    if($flag == 1 && isset($email) && isset($password)) {
                        $users = $this->userModel->login($email, $password);

                        // Đăng nhập thành công
                            if($users) {
                            if(isset($_POST['remember'])){
                                setcookie("username", $email);
                                setcookie("password", $password);
                            }
                            $_SESSION['id_account'] = $users['id'];
                            $_SESSION['role_account'] = $users['role_id'];
                            $_SESSION['name_account'] = $users['name'];
                            $_SESSION['email_account'] = $users['email'];
                            header('location: ../admin/'); 
                        }

                         // // Đăng nhập thất bại
                        else {
                            $error['fail'] = "Tài khoản hoặc mật khẩu không chính xác"; 
                        }
                    }
                }
                include_once './views/login.php';
                break;        
        }
    }
}