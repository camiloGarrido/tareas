<?php 

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
include "../seguridad/config.php";

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

$input = file_get_contents("php://input");  
$data = json_decode($input, true); 
$idPost = isset( $data['save']) ?  $data['save'] : 0;

//Codigo guardar
if($idPost != 0){
  
  if($idPost==1){
    $nombre = isset( $data['nombre']) ?  $data['nombre'] : "-";
    $descripcion = isset( $data['descripcion']) ?  $data['descripcion'] : "-";
    $sql = "  INSERT INTO `tarea`( `Nombre`, `descripcion`, `estado`) VALUES (?,?,1);";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt->bind_param("ss", $nombre, $descripcion);

        if ($stmt->execute()) {
          echo json_encode(array("message" => 200));
        } else {
          echo json_encode(array("message" => $stmt->error));
        }
    }

    $stmt->close();
  }

  die();
}


//Codigo actualizar

$idPost = isset( $data['update']) ?  $data['update'] : 0;

if($idPost != 0){
  $id = isset( $data['id']) ?  $data['id'] : "-";
  if($idPost == 1){
    $nombre = isset( $data['nombre']) ?  $data['nombre'] : "-";
    $descripcion = isset( $data['descripcion']) ?  $data['descripcion'] : "-";
    $sql = "UPDATE `tarea` SET `Nombre`=?,`descripcion`=? WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt->bind_param("ssi", $nombre, $descripcion,$id);

        if ($stmt->execute()) {
          echo json_encode(array("message" => 200));
        } else {
          echo json_encode(array("message" => $stmt->error));
        }
    }

    $stmt->close();
  }else  if($idPost == -1){
    $sql = "UPDATE `tarea` SET estado = 0 WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
          echo json_encode(array("message" => 200));
        } else {
          echo json_encode(array("message" => $stmt->error));
        }
    }

    $stmt->close();
  }else  if($idPost == 2){
    $sql = "UPDATE `tarea` SET estado = 2 WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
          echo json_encode(array("message" => 200));
        } else {
          echo json_encode(array("message" => $stmt->error));
        }
    }
  }
  die();
}





//$stmt = $conn->prepare("SELECT * FROM `tarea` WHERE id = ?");
//$stmt->bind_param("i", $id);

$stmt = $conn->prepare("SELECT * FROM `tarea` order by 1 desc ");


$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) { 
  $rows = array();
  while($r = $result->fetch_assoc()) {
     $rows[] = $r; 
    } 
     // Imprime el resultado como JSON print json_encode($rows); 
     } else { 
      
      $rows = [];
     
     }

     echo json_encode($rows);
$conn->close();
?>
