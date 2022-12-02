<?php
require_once("model/tablas1.php");
require_once("model/tablas2.php");

class Controller{
  //OPCIONES PARA LA VISTA
  static function index(){
    require_once("view/index.php");
  }

  static function LINK_CREATE(){
    require_once("view/create.php");
  }

  static function LINK_VER_TABLA1(){
    $array = Tablas1::getAll();
    require_once("view/vista_tabla1.php");

  }

  static function LINK_VER_UPDATE_TABLE1(){
    require_once("view/update_table1.php");
  }

  static function LINK_VER_DELETE_TABLE1(){
    require_once("view/delete_table1.php");
  }

  static function LINK_VER_UPDATE_TABLE2(){
    require_once("view/update_table2.php");
  }

  static function LINK_VER_DELETE_TABLE2(){
    require_once("view/delete_table2.php");
  }

  static function LINK_VER_TABLA2(){
    $array = Tablas2::getAll();
    require_once("view/vista_tabla2.php");
  }
  //PETICIONES----------------------------------------------------------------------
  static function TABLA1(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'GET':
        echo json_encode(Tablas1::getAll());
        break;
      
      default:
        break;
    }
  }

  static function TABLA1CREATE(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        $descripcion = $_POST['descripcion'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        //$datos = json_decode(file_get_contents('php://input'));
        if(!empty($descripcion) && !empty($nombres) && !empty($apellidos)){
          if(Tablas1::create($descripcion, $nombres, $apellidos)){
            http_response_code(200);
          }
        } else {
          echo "<script>alert('ERROR: campos vacios o incorrectos en el formulario')</script>";
        }
        break;
      default:
        break;
    }
  }

  static function TABLA1DELETE(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        //$datos = json_decode(file_get_contents('php://input'));
        $id = $_POST['id'];
        if(Tablas1::delete($id)){
          http_response_code(200);
        }
        break;
      
      default:
        break;
    }
  }

  static function TABLA1READ(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'GET':
        if(isset($_GET['id'])){
          echo json_encode(Tablas1::getById($_GET['id']));
        }
        break;
      default:
        break;
    }
  }
  
  static function TABLA1UPDATE(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        //$datos = json_decode(file_get_contents('php://input'));
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $descripcion = $_POST['descripcion'];

        if(Tablas1::update($id, $descripcion, $nombres, $apellidos)){
          http_response_code(200);
        }
        break;
      
      default:
        break;
    }
  }

  static function TABLA2(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'GET':
        echo json_encode(Tablas2::getAll());
        break;
      
      default:
        break;
    }
  }

  static function TABLA2CREATE(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        $tabla1_id = $_POST['tabla1_id'];
        $descripcion = $_POST['descripcion'];
        $titulo = $_POST['titulo'];
        $horario = $_POST['horario'];
        $fecha = $_POST['fecha'];
        $unidades = $_POST['unidades'];
        $precio = $_POST['precio'];
        $email = $_POST['email'];
        //$datos = json_decode(file_get_contents('php://input'));
        if(
          !empty($tabla1_id) &&
          !empty($descripcion) &&
          !empty($titulo) &&
          !empty($horario) &&
          !empty($fecha) &&
          !empty($unidades) &&
          !empty($precio) &&
          !empty($email)
        ){
          if(Tablas2::create(
              $tabla1_id, 
              $descripcion, 
              $titulo,
              $horario,
              $fecha,
              $unidades,
              $precio,
              $email
            )
          ){
            http_response_code(200);
          } else {
            echo "<script>alert('ERROR: campos vacios o incorrectos en el formulario')</script>";
          }
        }
        break;
      default:
        break;
    }
  }

  static function TABLA2DELETE(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        //$datos = json_decode(file_get_contents('php://input'));
        $id = $_POST['id'];
        
        if(Tablas2::delete($id)){
          http_response_code(200);
        }
        break;
      
      default:
        break;
    }
  }

  static function TABLA2READ(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'GET':
        if(isset($_GET['id'])){
          echo json_encode(Tablas2::getById($_GET['id']));
        }
        break;
      default:
        break;
    }
  }

  static function TABLA2UPDATE(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        //$datos = json_decode(file_get_contents('php://input'));
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $titulo = $_POST['titulo'];
        $horario = $_POST['horario'];
        $fecha = $_POST['fecha'];
        $unidades = $_POST['unidades'];
        $precio = $_POST['precio'];
        $email = $_POST['email'];

        if(Tablas2::update($id, $descripcion, $titulo, $horario, $fecha, $unidades, $precio, $email)){
          http_response_code(200);
        }
        break;
      
      default:
        break;
    }
  }

  static function REPORTES(){
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos != null){
          if(Tablas2::crear_reporte(
              $datos->tabla1_id, 
              $datos->descripcion, 
              $datos->titulo,
              $datos->horario,
              $datos->fecha,
              $datos->unidades,
              $datos->precio,
              $datos->email,
              $datos->fecha_ini,
              $datos->fecha_fin
            )
          ){
            http_response_code(200);
          }
        }
        break;
      default:
        break;
    }
  }







  //----------------------------------------------------------------------------




  //nuevo


  /*
  static function nuevo(){        
      require_once("vista/nuevo.php");
  }
  //guardar
  static function guardar(){
      $nombre= $_REQUEST['nombre'];
      $precio= $_REQUEST['precio'];
      $data = "'".$nombre."',".$precio;
      $producto = new Modelo();
      $dato = $producto->insertar("productos",$data);
      header("location:".urlsite);
  }



  //editar
  static function editar(){    
      $id = $_REQUEST['id'];
      $producto = new Modelo();
      $dato = $producto->mostrar("productos","id=".$id);        
      require_once("vista/editar.php");
  }
  //actualizar
  static function actualizar(){
      $id = $_REQUEST['id'];
      $nombre= $_REQUEST['nombre'];
      $precio= $_REQUEST['precio'];
      $data = "nombre='".$nombre."',precio=".$precio;
      $producto = new Modelo();
      $dato = $producto->actualizar("productos",$data,"id=".$id);
      header("location:".urlsite);
  }


  //eliminar
  static function eliminar(){    
      $id = $_REQUEST['id'];
      $producto = new Modelo();
      $dato = $producto->eliminar("productos","id=".$id);
      header("location:".urlsite);
  }
*/

}