<?php
class ProductController{
    private $model_product;
    public function __construct(){
        require_once('Model/Product.php');
        $this->model_product = new Product();//Khởi tạo model product
    }
    public function listing(){
       $arr_products = $this->model_product->getAll();
        //print_r($arr_products);die();//debug dữ liệu
        include('Views/listing.php');
    }
    public function add(){
        //Xử lý logic thêm
        //Kiểm tra người dùng có click lưu hay không
        if(isset($_POST['submit'])){
            $name = $_POST['name'] ?? '';
            $instructor = $_POST['instructor'] ?? '';
            $duration = $_POST['duration'] ?? '';
            $price = $_POST['price'] ?? '';
            $file = $_FILES['thumbnail'] ?? '';
            // print_r($file);die();
            $thumbnail = '';//Khởi tạo biến thumbnail để nếu không upload ảnh thì không bị lỗi
            if($name != '' && $instructor != '' && $price > 0 && $duration > 0){
                if($file['name'] != ''){
                    $thumbnail = time(). $file['name'];
                    if(getimagesize($file['tmp_name']) !== false){//Cái này có thể viết để check file up lên có phải là hình ảnh hay không.Ko viết cũng được
                        move_uploaded_file($file['tmp_name'], 'images/'.$thumbnail);
                    }
                    $this->model_product->store($name, $instructor, $price, $duration, $thumbnail);
                    header('Location: index.php');
                }
            }else{
                echo 'Các trường dữ liệu không được để thiếu';
            }
        }
        include('Views/add.php');
    }
    public function edit(){
        $id = $_GET['id'] ?? 0;
        $current = $this->model_product->getById($id);
        //Kiểm tra người dùng có click lưu hay không
        if(isset($_POST['submit'])){
            $name = $_POST['name'] ?? '';
            $instructor = $_POST['instructor'] ?? '';
            $duration = $_POST['duration'] ?? '';
            $price = $_POST['price'] ?? '';
            $file = $_FILES['thumbnail'] ?? '';
            // print_r($file);die();
            $thumbnail = '';//Khởi tạo biến thumbnail để nếu không upload ảnh thì không bị lỗi
            if($name != '' && $instructor != '' && $price > 0 && $duration > 0){
                if($file['name'] != ''){
                    $thumbnail = time(). $file['name'];
                    if(getimagesize($file['tmp_name']) !== false){//Cái này có thể viết để check file up lên có phải là hình ảnh hay không.Ko viết cũng được
                        move_uploaded_file($file['tmp_name'], 'images/'.$thumbnail);
                    }
                    $this->model_product->update($id, $name, $instructor, $price, $duration, $thumbnail);
                    header('Location: index.php');
                }
            }else{
                echo 'Các trường dữ liệu không được để thiếu';
            }
        }
        include('Views/edit.php');
    }
    public function delete(){
        $id = $_GET['id'] ?? 0;
        if($id > 0 ){
            $this->model_product->delete($id);
            header('Location: index.php');
        }
    }
}