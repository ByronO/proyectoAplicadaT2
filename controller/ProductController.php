<?php
/**
 * Created by PhpStorm.
 * User: Byron Ortiz Rojas
 * Date: 5/25/2019
 * Time: 11:09 p.m.
 */
session_start();


require 'model/ProductModel.php';

class ProductController
{
    public function __construct()
    {
        $this->view = new View();
    }

    //----------FUNCIONES QUE DESPLIEGAN LAS DIFERENTES VISTAS-----------

    public function home()
    {
        //llamar al modelo para traer datos

        $product = new ProductModel();

        $data['products'] = $product->getProducts();

        $this->view->show('indexView.php', $data);
    }

    public function registerProductView()
    {
        $this->view->show('registerProductView.php', null);
    }


    public function delete_updateView()
    {

        $product = new ProductModel();

        $data['products'] = $product->getProducts();

        $this->view->show('delete_updateView.php', $data);

    }

    //--------------------------------------------------------------------

    /*FUNCION QUE OBTIENE LOS VALORES INGRESADOPS EN EL FORMULARIO
    Y LOS ENVIA AL MODEL PARA QUE SE INSERTE EN LA BASE DE DATOS*/
    public function registerProduct()
    {
        $product = new ProductModel();

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $n = rand(1, 6);

        $path = 'public/imgs/T2p' . $n . '.jpg';


        $result = $product->registerProduct($name, $price, $description, $path);

        if($result[0][0] == 1){
            $this->view->show('registerProductView.php', null);
            echo '<script> alert("Este producto ya existe.")</script>';
        }else {

            $this->view->show('registerProductView.php', null);
        }

        //SEND NEW PRODUCT TO API
        $url = 'http://192.168.43.90:63600/api/values/registerProduct';

        $params = array('Name' => $name,'Price' => $price, 'Image' => $path,
            'Status' => 1,'Description' => $description, 'Provider' => 2);
        $content = json_encode($params);
        $header = array(
            "Content-Type: application/json",
            "Content-Length: ".strlen($content)
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => implode("\r\n", $header)
            ));


        $result=file_get_contents($url, false, stream_context_create($options));
        $data = json_decode($result);


    }

    public function deleteProduct()
    {
        $product = new ProductModel();

        $id = $_POST['id'];
        $name = $_POST['name'];

        $product->deleteProduct($id);

        //SEND  TO API
        $url = 'http://192.168.43.90:63600/api/values/deleteProduct';

        $params = array('Name' => $name, 'Provider' => 2);
        $content = json_encode($params);
        $header = array(
            "Content-Type: application/json",
            "Content-Length: ".strlen($content)
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => implode("\r\n", $header)
            ));


        $result=file_get_contents($url, false, stream_context_create($options));
        $data = json_decode($result);


    }


    public function updateProduct()
    {

        $product = new ProductModel();

        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $product->updateProduct($id, $name, $price, $description);

        //SEND  TO API
        $url = 'http://192.168.43.90:63600/api/values/updateProduct';

        $params = array('Name' => $name,'Price' => $price, 'Description' => $description, 'Provider' => 2);
        $content = json_encode($params);
        $header = array(
            "Content-Type: application/json",
            "Content-Length: ".strlen($content)
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => implode("\r\n", $header)
            ));


        $result=file_get_contents($url, false, stream_context_create($options));
        $data = json_decode($result);

    }

    public function code()
    {

        $url = 'http://192.168.43.90:52698/api/values/GetCode';

        $params = array('id' => 2,'name' => 'PC MANIA CR', 'address' => 'Heredia' );
        $content = json_encode($params);
        $header = array(
            "Content-Type: application/json",
            "Content-Length: ".strlen($content)
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => implode("\r\n", $header)
            ));


        $result=file_get_contents($url, false, stream_context_create($options));
        $data = json_decode($result);


        $this->view->show('codeView.php', $data);
    }


}