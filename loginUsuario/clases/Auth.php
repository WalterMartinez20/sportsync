<?php
include "Conexion.php";

class Auth extends Conexion
{
    public function registrarUsuario($correo, $password)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO t_usuarios (correo, password) VALUES (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $correo, $password);
        return $query->execute();
    }

    public function registrarSalon($email, $password, $servicios)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO salones (email, password, $servicios) VALUES (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ss', $email, $password);
        return $query->execute();
    }

    public function completarCita($citaID)
    {
        $conexion = parent::conectar();
        $sql = "UPDATE citas SET estado = 'completo' WHERE id=?";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $citaID);
        return $query->execute();
    }

    public function cancelarCita($citaID)
    {
        $conexion = parent::conectar();
        $sql = "UPDATE citas SET estado = 'cancelado' WHERE id=?";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $citaID);
        return $query->execute();
    }

    public function retomarCita($citaID)
    {
        $conexion = parent::conectar();
        $sql = "UPDATE citas SET estado = 'activo' WHERE id=?";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $citaID);
        return $query->execute();
    }

    public function conseguirCitas($salonID)
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM citas WHERE salon_id = '$salonID'";
        $respuesta = mysqli_query($conexion, $sql);

        $citas = array();

        while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
            $citas[] = $fila;
        }
        return $citas;
    }

    public function nuevaCita($salonID, $servicio, $nombre, $telefono, $correo, $fecha, $hora, $mensaje, $timestamp)
    {
        $conexion = parent::conectar();

        $sql = "SELECT * FROM citas WHERE timestamp LIKE ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("s", $timestamp);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            return "exist_timestamp";
        }

        $sql = "SELECT * FROM citas WHERE salon_id = ? AND fecha = ? AND hora = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("iss", $salonID, $fecha, $hora);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            return "exist_date_time";
        }

        $sql = "INSERT INTO citas (salon_id, servicio, nombre, telefono, correo, fecha, hora, mensaje, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("isssssssi", $salonID, $servicio, $nombre, $telefono, $correo, $fecha, $hora, $mensaje, $timestamp);

        if ($query->execute()) {
            return "success";
        } else {
            return "fail";
        }
    }


    public function conseguirServicios($salonID)
    {
        $conexion = parent::conectar();
        $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $salonID);
        $query->execute();

        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            $servicios = $row['servicios'];
            $serviciosArray = explode(",", $servicios);

            return $serviciosArray;
        } else {
            return array();
        }
    }

    public function actualizarServicio($salonID, $servicio, $servicioAnterior)
    {
        $conexion = parent::conectar();
        $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $salonID);
        $query->execute();

        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            $servicios = $row['servicios'];
            $serviciosArray = explode(",", $servicios);

            $posicion = array_search($servicioAnterior, $serviciosArray);
            if ($posicion !== false) {
                $serviciosArray[$posicion] = $servicio;

                $serviciosActualizados = implode(",", $serviciosArray);

                $sql = "UPDATE salones SET servicios=? WHERE id=?";
                $query = $conexion->prepare($sql);
                $query->bind_param("si", $serviciosActualizados, $salonID);
                return $query->execute();
            }
        }

        return false;
    }

    public function nuevoServicio($salonId, $nombre)
    {
        $conexion = parent::conectar();

        $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $salonId);
        $query->execute();
        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            $servicios = $row['servicios'];

            $servicios .= "," . $nombre;

            $sql = "UPDATE salones SET servicios=? WHERE id=?";
            $query = $conexion->prepare($sql);
            $query->bind_param("si", $servicios, $salonId);
            return $query->execute();
        }

        return false;
    }

    public function eliminarServicio($salonId, $nombre)
    {
        $conexion = parent::conectar();

        $sql = "SELECT servicios FROM salones WHERE id = ? LIMIT 1";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $salonId);
        $query->execute();
        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            $servicios = $row['servicios'];

            $serviciosArray = explode(",", $servicios);

            $posicion = array_search($nombre, $serviciosArray);

            if ($posicion !== false) {
                unset($serviciosArray[$posicion]);

                $serviciosActualizados = implode(",", $serviciosArray);

                $sql = "UPDATE salones SET servicios=? WHERE id=?";
                $query = $conexion->prepare($sql);
                $query->bind_param("si", $serviciosActualizados, $salonId);
                return $query->execute();
            }
        }

        return false;
    }

    public function loginSalon($email, $password)
    {
        $conexion = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM salones WHERE email = '$email'";
        $respuesta = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($respuesta) > 0) {
            $parseRes = mysqli_fetch_array($respuesta);
            $passwordExistente = $parseRes['password'];

            if (password_verify($password, $passwordExistente)) {
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $parseRes['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function loginInfo($email, $password)
    {
        $conexion = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM salones WHERE email = '$email'";
        $respuesta = mysqli_query($conexion, $sql);
        $parseRes = mysqli_fetch_array($respuesta);

        $logoData = $parseRes['logos'];
        if (strpos($logoData, ',') !== false) {
            $logoArray = explode(',', $logoData);
            $logo = trim($logoArray[0]);
        } else {
            $logo = $logoData;
        }

        return [$logo, $_SESSION['id']];
    }

    public function conseguirSalones()
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM salones2";
        $respuesta = mysqli_query($conexion, $sql);

        $salones = array();

        while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
            $salones[] = $fila;
        }
        return $salones;
    }

    public function conseguirSalon($id)
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM salones WHERE id = '$id'";
        $respuesta = mysqli_query($conexion, $sql);

        $parseRes = mysqli_fetch_array($respuesta, MYSQLI_ASSOC);
        return $parseRes;
    }

    public function loginUserInfo($correo, $password)
    {
        $conexion = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM t_usuarios WHERE correo = '$correo'";
        $respuesta = mysqli_query($conexion, $sql);
        $parseRes = mysqli_fetch_array($respuesta);

        $name = $parseRes['nombre'];

        return [$name];
    }

    public function loginUsuario($correo, $password)
    {
        $conexion = parent::conectar();
        $passwordExistente = "";
        $sql = "SELECT * FROM t_usuarios WHERE correo = '$correo'";
        $respuesta = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($respuesta) > 0) {
            $parseRes = mysqli_fetch_array($respuesta);
            $passwordExistente = $parseRes['password'];

            if (password_verify($password, $passwordExistente)) {
                $_SESSION['correo'] = $correo;
                $_SESSION['id'] = 0;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
