<?php
class LoginController{
    private $model;
    private $view;
    public function __construct()
    {
     $this->view=PATH_VIEW.'Login.php';
     $this->model=new LoginModel();     
    }
 

    public function showLoginForm() {
        require_once PATH_VIEW.'Login.php';
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->validateUser($username, $password);
          
            if ($user!=false) {
                session_start();
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['user_id'] = $user[0]['user_id'];
                $_SESSION['user_type'] = $user[0]['user_type'];
                $_SESSION['isLogin'] = true;
                if ($user[0]['user_type']==='member'){
                    header('Location: index.php?action=dashboard');
                    exit();}
                else{
                    header('Location: index.php?action=adminDashBoard');
                    exit();}
                }
             else {
                // Đăng nhập thất bại
                $error = "Tên đăng nhập hoặc mật khẩu không đúng";
                require_once 'Views/login.php';
            }
        } else {
            // Hiển thị form đăng nhập nếu không phải là POST request
            $this->showLoginForm();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>