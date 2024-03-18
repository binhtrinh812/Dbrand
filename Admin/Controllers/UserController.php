<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;
class UserController extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');

        $this->index();
    }

    public function index ()
    {
        if($_SESSION['role_account'] == 10) {
            $method = isset($_GET['method']) ? $_GET['method'] : 'show';
            switch($method) {
                case 'show':
                    $now = Carbon::now();
                    $toDay = $now->format('Y-m-d');
                    $firstOfMonth = $now->firstOfMonth()->format('Y-m-d');
    
                    ##format cho cái input daterange
                    $nowSub = Carbon::now();
                    $toDaySub = $nowSub->format('m-d-Y');
                    $firstOfMonthSub = $nowSub->firstOfMonth()->format('m-d-Y');
                    
                    $users = $this->userModel->showAllUser();
                    include_once './views/users/show_user.php';
                    break;
                case 'add':
                    $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
                    $regexPhone = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
                    $regexEmail = '/(?![[:alnum:]]|@|-|_|\.)./';
                    if(isset($_POST['submit_register'])) {
                        $error['email'] = '';
                        $error['password'] = '';
                        $flag = 1;
                        // Validate name
                        if(empty($_POST['name'])) {
                            $error['name'] = '(Vui lòng nhập họ tên)';
                            $flag = 0;
                        }
                        else if (!preg_match($regexName, $_POST['name'])){
                            $error['name'] = '(Họ tên không hợp lệ)';
                            $flag = 0;
                        }
                        else
                            $name = trim($_POST['name']);
    
                        // Validate email
                        // check email đã tồn tại bằng onkeyup
                        if(empty($_POST['email'])) {
                            $error['email'] = '(Vui lòng nhập email)';
                            $flag = 0;
                        }
                        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                            $error['email'] = '(Email không hợp lệ)';
                            $flag = 0;
                        }
                        else {
                            $email = trim($_POST['email']);
                        }
                        // Validate password
                        if(empty($_POST['password'])) {
                            $error['password'] = '(Vui lòng nhập mật khẩu)';
                            $flag = 0;
                        }
                        else
                            $password = trim($_POST['password']);
                        
                        // Validate Check pass
                        if(empty($_POST['check_pass'])) {
                            $error['check_pass'] = '(Vui lòng xác nhận mật khẩu)';
                            $flag = 0;
                        }
                        else
                            $checkPass = trim($_POST['check_pass']);
    
                        if($flag == 1) 
                        {
                            if($checkPass == $password) {
                                $user = $this->userModel->showUserByEmail($email);
                                if($email != $user['email']) {
                                    $dbPass = md5($password);
                                    $addUser = $this->userModel->addUser($email, $dbPass, $name);
                                    if($addUser) {
                                        $_SESSION['alert'] = 1;
                                        header('location: index.php?page=member');
                                    }
                                }
                                else {
                                    $error['email'] = "(Email đã tồn tại)";
                                }
                            }
                            else {
                                $error['check_pass'] = "(Xác nhận mật khẩu không hợp lệ)";
                            }
                        }
                    }
                    include_once './views/users/add_user.php';
                    break;

                case 'update':
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $user = $this->userModel->showUserById($id);
                        $roles = $this->userModel->showRoles();
                        if(isset($_POST['submit_update'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $role = $_POST['role'];
                            $update = $this->userModel->updateUser($id , $name, $email, $role);
                            if($update) {
                                // $_SESSION['role_account'] = $role;
                                // $_SESSION['name_account'] = $name;
                                // $_SESSION['email_account'] = $email;

                                header('location: index.php?page=member&method=update&id='.$id);
                            }
                        }
                    }
                    include_once './views/users/update_user.php';
                    break;
                
                case 'edit':
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $user = $this->userModel->showUserById($id);
                        $roles = $this->userModel->showRoles();
                        $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
                        $regexPhone = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
                        $regexEmail = '/(?![[:alnum:]]|@|-|_|\.)./';
                        if(isset($_POST['submit_edit'])) {
                            $infoUser = $this->userModel->showUserById($id);

                            $error['email'] = '';
                            $error['password'] = '';
                            $flag = 1;
                            // Validate name
                            if(empty($_POST['name'])) {
                                $error['name'] = '(Vui lòng nhập họ tên)';
                                $flag = 0;
                            }
                            else if (!preg_match($regexName, $_POST['name'])){
                                $error['name'] = '(Họ tên không hợp lệ)';
                                $flag = 0;
                            }
                            else
                                $name = trim($_POST['name']);
        
                            // Validate email
                            // check email đã tồn tại bằng onkeyup
                            if(empty($_POST['email'])) {
                                $error['email'] = '(Vui lòng nhập email)';
                                $flag = 0;
                            }
                            else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                $error['email'] = '(Email không hợp lệ)';
                                $flag = 0;
                            }
                            else {
                                $email = trim($_POST['email']);
                            }
                            // Validate password
                            if(empty($_POST['oldpassword'])) {
                                $error['oldpassword'] = '(Vui lòng nhập mật khẩu hiện tại)';
                                $flag = 0;
                            }

                            else
                                $oldpassword = trim($_POST['oldpassword']);

                            
                            if(empty($_POST['password'])) {
                                $error['password'] = '(Vui lòng nhập mật khẩu mới)';
                                $flag = 0;
                            }
                            else
                                $password = trim($_POST['password']);
                            
                            // Validate Check pass
                            if(empty($_POST['check_pass'])) {
                                $error['check_pass'] = '(Vui lòng xác nhận mật khẩu)';
                                $flag = 0;
                            }
                            else
                                $checkPass = trim($_POST['check_pass']);
                            if($flag == 1) 
                            {
                                if(md5($oldpassword) == $infoUser['password']) {
                                    if($checkPass == $password) {
                                        $user = $this->userModel->showUserByEmail($email);
                                        if($email != $user['email'] || $email == $_SESSION['email_account']) {
                                            $dbPass = md5($password);
                                            $updateUser = $this->userModel->updatePassUser($id , $name, $email, $dbPass);
                                            if($updateUser) {
                                                $_SESSION['alert'] = 1;
                                                $_SESSION['role_account'] = $role;
                                                $_SESSION['name_account'] = $name;
                                                $_SESSION['email_account'] = $email;                    
                                                header('location: index.php?page=member&method=edit&id='.$id);
                                            }
                                        }
                                        else {
                                            $error['email'] = "(Email đã tồn tại)";
                                        }
                                    }
                                    else {
                                        $error['check_pass'] = "(Xác nhận mật khẩu không hợp lệ)";
                                    }
                                }
                                else {
                                    $error['oldpassword'] = '(Mật khẩu không hợp lệ)';
                                    $flag = 0;
                                }
                            }
                        }
                    }
                    include_once './views/users/edit_user.php';
                    break;
            }

        }
        else{
            header('location: index.php?page=dashboard');
        }

    }
}