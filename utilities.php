<?php
    function getUserData($email){
        $file = fopen("cuentas.txt", "r");
        $userData = array("", "", "", "");
        while (!feof($file)) {
            $linea = fgets($file);
            if ($linea != "") {
                $aux = preg_split("/[\s]+/", $linea);
                if($aux[0] === $email) {
                    $userData = $aux;
                }
            }
        }
        fclose($file);
        return $userData;
    }

    function editFile($email, $dataIndex, $newData) {
        $archivo = "cuentas.txt"; // Reemplaza con la ruta de tu archivo
    
        // Abre el archivo en modo lectura y escritura
        $archivo_handler = fopen($archivo, "r+");
    
        if ($archivo_handler) {
            // Lee el contenido completo del archivo en un string
            $contenido = fread($archivo_handler, filesize($archivo));
            
            $userData = getUserData($email);
            
            // Busca el usuario a modificar
            $posicion = strpos($contenido, $userData[0].' '.$userData[1].' '.$userData[2].' '.$userData[3]);

            for ($i=0; $i < $dataIndex; $i++) { 
                $posicion += strlen($userData[$i]);
                $posicion++;
            }
            
            if ($posicion !== false) {
                // Reemplaza la información con la nueva información
                $contenido = substr_replace($contenido, $newData, $posicion, strlen($userData[$dataIndex]));
                
                // Trunca el archivo (lo hace más corto) para eliminar la información antigua que ya no se necesita
                ftruncate($archivo_handler, strlen($contenido));
        
                // Retrocede al inicio del archivo
                fseek($archivo_handler, 0);
        
                // Escribe el contenido modificado de vuelta al archivo
                fwrite($archivo_handler, $contenido);
            }
            fclose($archivo_handler);
        } else {
            echo "No se pudo abrir el archivo.";
        }
    }

    function generateExamPasswd($longitud) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo = '';
        
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        
        return $codigo;
    }
?>
