 <?php
    header("Access-Control-Allow-Origin: *");
    
    $conn = new mysqli("localhost","root","","test");

    if ($conn->connect_error){
        die("Conexão Falhou. ".$conn->connect_error );
    }
    
    $result = array('error'=>false);
    $action = '';

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if ($action == 'read'){
        $sql = $conn->query("SELECT * FROM usuarios");
        $users = array();
        while($row = $sql->fetch_assoc()){
            array_push($users, $row);
        }
        $result['usuarios'] = $users;
        
    }

    if ($action == 'create'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = $conn->query("
            INSERT INTO usuarios (name, email, phone)
            VALUES ('$name','$email','$phone');
        ");

        if ($sql){
            $result['message'] = "Usuário inserido com sucesso.";
        }else{
            $result['error'] = true;
            $result['message'] = "Usuário NÃO inserido.";
        }

    }


    if ($action == 'update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = $conn->query("
            UPDATE usuarios 
            SET name='$name',email='$email',phone='$phone' 
            WHERE id='$id';
        ");

        if ($sql){
            $result['message'] = "Usuário atualizado com sucesso.";
        }else{
            $result['error'] = true;
            $result['message'] = "Usuário NÃO atualizado.";
        }

    }

    if ($action == 'delete'){
        $id = $_POST['id'];

        $sql = $conn->query("
            DELETE FROM usuarios 
            WHERE id='$id';
        ");

        if ($sql){
            $result['message'] = "Usuário deletado com sucesso.";
        }else{
            $result['error'] = true;
            $result['message'] = "Usuário NÃO deletado.";
        }

    }

    echo json_encode($result);
 ?>