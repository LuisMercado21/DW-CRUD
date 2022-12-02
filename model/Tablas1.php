<?php
  require_once "connection/Connection.php";

  class Tablas1 {
    
    public static function getAll(){
      $db = new Connection();
      $query = "SELECT * FROM tabla1";
      $resultado = $db->query($query);
      $datos = [];
      if($resultado->num_rows){
        while($row = $resultado->fetch_assoc()) {
          $datos[] = [
            'id' => $row['id'],
            'descripcion' => $row['descripcion'],
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos']
          ];
        }
        return $datos;
      }
      return $datos;
    }

    public static function getById($id){
      $db = new Connection();
      $query = "SELECT * FROM tabla1 WHERE id = $id";
      $resultado = $db->query($query);
      $datos = [];
      if($resultado->num_rows){
        while($row = $resultado->fetch_assoc()) {
          $datos[] = [
            'id' => $row['id'],
            'descripcion' => $row['descripcion'],
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos']
          ];
        }
        return $datos;
      }
      return $datos;
    }

    public static function create($descripcion, $nombres, $apellidos){
      
      if(is_string($descripcion) && is_string($nombres) && is_string($apellidos)){
        $db = new Connection();
        $query = "INSERT INTO tabla1 (descripcion, nombres, apellidos)
        VALUES ('".$descripcion."', '".$nombres."', '".$apellidos."')";
        $db->query($query);
        if($db->affected_rows){ 
          $query2 = "SELECT * FROM tabla1 ORDER BY id DESC LIMIT 1";
          $res = $db->query($query2);
          $datos = [];
          if($res->num_rows){
            while($row = $res->fetch_assoc()) {
              $datos[] = [
                'id' => $row['id'],
                'descripcion' => $row['descripcion'],
                'nombres' => $row['nombres'],
                'apellidos' => $row['apellidos']
              ];
            }
            //echo json_encode($datos);
            //echo "<script>alert('Agregado a TABLA 1!')</script>";
            //header("Location: index.php?m=LINK_CREATE");

            echo 
            "<script>
              alert('Agregado a TABLA 1!');
              window.location.href='index.php?m=LINK_CREATE';
            </script>";
          }
          //header('Location: index.php');
          //echo file_get_contents('php://input'); //Esta es la respuesta pero no muestra el ID
        } else {
          return FALSE;
        }
      } else if(!is_string($nombres)){
          $response = array(
            'error' => 'El campo nombres debe ser de tipo alfabetico'
          );
          echo json_encode($response);
          return FALSE;
        } else if(!is_string($descripcion)){
          $response = array(
            'error' => 'El campo descripcion debe ser de tipo alfabetico'
          );
          echo json_encode($response);
          return FALSE;
        } else if(!is_string($apellidos)){
          $response = array(
            'error' => 'El campo apellidos debe ser de tipo alfabetico'
          );
          echo json_encode($response);
          return FALSE;
        }

    }

    public static function update($id_registro, $descripcion, $nombres, $apellidos){
      if(is_numeric($id_registro) == 1 && is_string($nombres) && is_string($apellidos) && is_string($descripcion)){
        $db = new Connection();
        $query = "UPDATE tabla1 SET 
        descripcion = '".$descripcion."', nombres = '".$nombres."', apellidos = '".$apellidos."'
        WHERE id=$id_registro";
        $query2 = "SELECT * FROM tabla1 WHERE id = $id_registro";

        $db->query($query);
        if($db->affected_rows){
          $res = $db->query($query2);
          $datos = [];
          if($res->num_rows){
            while($row = $res->fetch_assoc()) {
              $datos[] = [
                'mensaje' => 'Registro actualizado satisfactoriamente',
                'data' => [
                  'id' => $row['id'],
                  'descripcion' => $row['descripcion']
                ],
                
              ];
            }
          }
          //echo json_encode($datos);
          echo 
            "<script>
              alert('Actualizado!');
              window.location.href='index.php?m=LINK_VER_TABLA1';
            </script>";
        } else {
          return FALSE;
        }
      } else if(!is_string($nombres)){
        $response = array(
          'error' => 'El campo nombres debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($descripcion)){
        $response = array(
          'error' => 'El campo descripcion debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_string($apellidos)){
        $response = array(
          'error' => 'El campo apellidos debe ser de tipo alfabetico'
        );
        echo json_encode($response);
        return FALSE;
      } else if(!is_numeric($id_registro)){
        $response = array(
          'error' => 'El campo id_registro debe ser de tipo numerico'
        );
        echo json_encode($response);
        return FALSE;
      }
    }

    public static function delete($id){
      $db = new Connection();
      $query = "SELECT * FROM tabla1 WHERE id = $id";
      $query2 = "DELETE FROM tabla1 WHERE id = $id";
  
      $res = $db->query($query);
      $datos = [];
      if($res->num_rows){
        while($row = $res->fetch_assoc()) {
          $datos[] = [
            'mensaje' => 'Registro eliminado satisfactoriamente',
            'data' => [
              'id' => $row['id'],
              'descripcion' => $row['descripcion'],
              'nombres' => $row['nombres'],
              'apellidos' => $row['apellidos']
            ],
            
          ];
        }
        $db->query($query2);
        if($db->affected_rows){
          //echo json_encode($datos);
          echo 
            "<script>
              alert('Eliminado!');
              window.location.href='index.php?m=LINK_VER_TABLA1';
            </script>";
        }
      }
    }
  }
  
?>