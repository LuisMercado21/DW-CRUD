<?php
  require_once "connection/Connection.php";

  function validateDate($date, $format = 'd-m-Y'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }

  class Tablas2 {
    public static function getAll(){
      $db = new Connection();
      $query = "SELECT * FROM tabla2";
      $resultado = $db->query($query);
      $datos = [];
      if($resultado->num_rows){
        while($row = $resultado->fetch_assoc()) {
          $tabla1_id = $row['tabla1_id'];
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          $datos[] = [
            'id' => $row['id'],
            'tabla1_id' => $row['tabla1_id'],
            'descripcion' => $row['descripcion'],
            'titulo' => $row['titulo'],
            'horario' => $row['horario'],
            'fecha' => $row['fecha'],
            'unidades' => $row['unidades'],
            'precio' => $row['precio'],
            'email' => $row['email'],
            'data_fk' => [
              'id' => $row2['id'],
              'descripcion' => $row2['descripcion'],
              'nombres' => $row2['nombres'],
              'apellidos' => $row2['apellidos']
            ]
          ];
        }
        return $datos;
      }
      return $datos;
    }

    public static function getById($id){
      $db = new Connection();
      $query = "SELECT * FROM tabla2 WHERE id = $id";
      $resultado = $db->query($query);
      $datos = [];
      if($resultado->num_rows){
        while($row = $resultado->fetch_assoc()) {
          $tabla1_id = $row['tabla1_id'];
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          $datos[] = [
            'id' => $row['id'],
            'fk_id' => $row['tabla1_id'],
            'descripcion' => $row['descripcion'],
            'titulo' => $row['titulo'],
            'horario' => $row['horario'],
            'fecha' => $row['fecha'],
            'unidades' => $row['unidades'],
            'precio' => $row['precio'],
            'email' => $row['email'],
            'data_fk' => [
              'id' => $row2['id'],
              'descripcion' => $row2['descripcion'],
              'nombres' => $row2['nombres'],
              'apellidos' => $row2['apellidos']
            ]
          ];
        }
        return $datos;
      }
      return $datos;
    }

    public static function create($tabla1_id, $descripcion, $titulo, $horario, $fecha, $unidades, $precio, $email){
      
      if(
        is_numeric($tabla1_id) == 1 &&
        is_string($descripcion) &&
        is_string($titulo) &&
        is_numeric($unidades) == 1 &&
        is_numeric($precio) == 1 &&
        filter_var($email, FILTER_VALIDATE_EMAIL)
      ){
        $db = new Connection();
        $query = "INSERT INTO tabla2 (tabla1_id, descripcion, titulo, horario, fecha, unidades, precio, email)
        VALUES ($tabla1_id, '".$descripcion."', '".$titulo."', '".$horario."', '".$fecha."', $unidades, $precio, '".$email."')";
        $db->query($query);
        if($db->affected_rows){ 
          $query2 = "SELECT * FROM tabla2 ORDER BY id DESC LIMIT 1";
          $res = $db->query($query2);
          $datos = [];
          if($res->num_rows){
            $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
            $res2 = $db->query($query3);
            $row2 = $res2->fetch_assoc();
            while($row = $res->fetch_assoc()) {
              $datos[] = [
                'id' => $row['id'],
                'fk_id' => $row['tabla1_id'],
                'descripcion' => $row['descripcion'],
                'titulo' => $row['titulo'],
                'horario' => $row['horario'],
                'fecha' => $row['fecha'],
                'unidades' => $row['unidades'],
                'precio' => $row['precio'],
                'email' => $row['email'],
                'data_fk' => [
                  'id' => $row2['id'],
                  'descripcion' => $row2['descripcion'],
                  'nombres' => $row2['nombres'],
                  'apellidos' => $row2['apellidos']
                ]
              ];
            }
            //echo json_encode($datos);
            echo 
            "<script>
              alert('Agregado a TABLA 2!');
              window.location.href='index.php?m=LINK_CREATE';
            </script>";
          }
          //echo file_get_contents('php://input'); //Esta es la respuesta pero no muestra el ID
        } else {
          return FALSE;
        }
      } else if(!is_numeric($tabla1_id)){
        $response = array(
          'error' => 'El campo id debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($descripcion)){
        $response = array(
          'error' => 'El campo descripcion debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($titulo)){
        $response = array(
          'error' => 'El campo titulo debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_numeric($unidades)){
        $response = array(
          'error' => 'El campo unidades debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_numeric($precio)){
        $response = array(
          'error' => 'El campo precio debe ser de tipo flotante'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response = array(
          'error' => 'El campo email debe ser de tipo email'
        );
        echo json_encode($response);
        return FALSE;
      }
      
    }

    public static function update($id_registro, $descripcion, $titulo, $horario, $fecha, $unidades, $precio, $email){
      
      if(
        is_numeric($id_registro) == 1 &&
        is_string($descripcion) &&
        is_string($titulo) &&
        is_numeric($unidades) == 1 &&
        is_numeric($precio) == 1 &&
        filter_var($email, FILTER_VALIDATE_EMAIL)
      ){
        $db = new Connection();
        $query = "UPDATE tabla2 SET
        descripcion = '".$descripcion."', titulo = '".$titulo."', horario = '".$horario."', fecha = '".$fecha."', unidades = $unidades, precio = $precio, email = '".$email."'
        WHERE id=$id_registro";
        $query2 = "SELECT * FROM tabla2 WHERE id = $id_registro";
        $db->query($query);
        if($db->affected_rows){
          $res = $db->query($query2);
          $datos = [];
          if($res->num_rows){
            while($row = $res->fetch_assoc()) {
              $tabla1_id = $row['tabla1_id'];
              $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
              $res2 = $db->query($query3);
              $row2 = $res2->fetch_assoc();
              $datos[] = [
                'mensaje' => 'Registro actualizado satisfactoriamente',
                'data' => [
                  'id' => $row['id'],
                  'fk_id' => $row['tabla1_id'],
                  'descripcion' => $row['descripcion'],
                  'titulo' => $row['titulo'],
                  'horario' => $row['horario'],
                  'fecha' => $row['fecha'],
                  'unidades' => $row['unidades'],
                  'precio' => $row['precio'],
                  'email' => $row['email'],
                  'data_fk' => [
                    'id' => $row2['id'],
                    'descripcion' => $row2['descripcion'],
                    'nombres' => $row2['nombres'],
                    'apellidos' => $row2['apellidos']
                  ]
                ]
              ];
            }
          }
          //echo json_encode($datos);
          echo 
            "<script>
              alert('Actualizado!');
              window.location.href='index.php?m=LINK_VER_TABLA2';
            </script>";
        }
      } else if(!is_numeric($id_registro)){
        $response = array(
          'error' => 'El campo id debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($descripcion)){
        $response = array(
          'error' => 'El campo descripcion debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($titulo)){
        $response = array(
          'error' => 'El campo titulo debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_numeric($unidades)){
        $response = array(
          'error' => 'El campo unidades debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_numeric($precio)){
        $response = array(
          'error' => 'El campo precio debe ser de tipo flotante'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response = array(
          'error' => 'El campo email debe ser de tipo email'
        );
        echo json_encode($response);
        return FALSE;
      }
    }

    public static function delete($id){
      $db = new Connection();
      $query = "SELECT * FROM tabla2 WHERE id = $id"; 
      $query2 = "DELETE FROM tabla2 WHERE id = $id";
  
      $res = $db->query($query);
      $datos = [];
      if($res->num_rows){
        while($row = $res->fetch_assoc()) {
          $tabla1_id = $row['tabla1_id'];
          $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
          $res2 = $db->query($query3);
          $row2 = $res2->fetch_assoc();
          $datos[] = [
            'mensaje' => 'Registro eliminado satisfactoriamente',
            'data' => [
              'id' => $row['id'],
              'fk_id' => $row['tabla1_id'],
              'descripcion' => $row['descripcion'],
              'titulo' => $row['titulo'],
              'horario' => $row['horario'],
              'fecha' => $row['fecha'],
              'unidades' => $row['unidades'],
              'precio' => $row['precio'],
              'email' => $row['email'],
              'data_fk' => [
                'id' => $row2['id'],
                'descripcion' => $row2['descripcion'],
                'nombres' => $row2['nombres'],
                'apellidos' => $row2['apellidos']
              ]
            ]
          ];
        }
        
        $db->query($query2);
        if($db->affected_rows){
          //echo json_encode($datos);
          echo 
            "<script>
              alert('Eliminado!');
              window.location.href='index.php?m=LINK_VER_TABLA2';
            </script>";
        }
      }
    }

    public static function crear_reporte($tabla1_id, $descripcion, $titulo, $horario, $fecha, $unidades, $precio, $email, $fecha_ini, $fecha_fin){
      
      

      if(
        is_int($tabla1_id) &&
        is_string($descripcion) &&
        is_string($titulo) &&
        is_int($unidades) &&
        is_float($precio) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        var_dump(validateDate($fecha_ini, 'd-m-Y')) &&
        var_dump(validateDate($fecha_fin, 'd-m-Y'))
      ){
        $db = new Connection();
        $query = "INSERT INTO tabla2 (tabla1_id, descripcion, titulo, horario, fecha, unidades, precio, email, fecha_ini, fecha_fin)
        VALUES ($tabla1_id, '".$descripcion."', '".$titulo."', '".$horario."', '".$fecha."', $unidades, $precio, '".$email."', '".$fecha_ini."', '".$fecha_fin."')";
        $db->query($query);
        if($db->affected_rows){ 
          $query2 = "SELECT * FROM tabla2 ORDER BY id DESC LIMIT 1";
          $res = $db->query($query2);
          $datos = [];
          if($res->num_rows){
            $query3 = "SELECT * FROM `usuarios`.`tabla1` WHERE `id` = $tabla1_id";
            $res2 = $db->query($query3);
            $row2 = $res2->fetch_assoc();
            while($row = $res->fetch_assoc()) {
              $datos[] = [
                'id' => $row2['id'],
                'descripcion' => $row2['descripcion'],
                'nombres' => $row2['nombres'],
                'apellidos' => $row2['apellidos'],
                'Tabla2' => [
                  'id' => $row['id'],
                  'descripcion' => $row['descripcion'],
                  'titulo' => $row['titulo'],
                  'horario' => $row['horario'],
                  'fecha' => $row['fecha'],
                  'unidades' => $row['unidades'],
                  'precio' => $row['precio'],
                  'email' => $row['email'],
                  'fecha_ini' => $row['fecha_ini'],
                  'fecha_fin' => $row['fecha_fin']
                ]
              ];
            }
            echo json_encode($datos);
          }
          //echo file_get_contents('php://input'); //Esta es la respuesta pero no muestra el ID
        } else {
          return FALSE;
        }
      } else if(!is_int($tabla1_id)){
        $response = array(
          'error' => 'El campo id debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($descripcion)){
        $response = array(
          'error' => 'El campo descripcion debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($titulo)){
        $response = array(
          'error' => 'El campo titulo debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_int($unidades)){
        $response = array(
          'error' => 'El campo unidades debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_float($precio)){
        $response = array(
          'error' => 'El campo precio debe ser de tipo flotante'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response = array(
          'error' => 'El campo email debe ser de tipo email'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!var_dump(validateDate($fecha_ini, 'd/m/Y'))) {
        $response = array(
          'mensaje' => 'La fecha inicial no tiene el formato dd/mm/aaaa'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!var_dump(validateDate($fecha_fin, 'd/m/Y'))) {
        $response = array(
          'mensaje' => 'La fecha final no tiene el formato dd/mm/aaaa'
        );
        echo json_encode($response);
        return FALSE;
      }
      
    }
  }
  
?>