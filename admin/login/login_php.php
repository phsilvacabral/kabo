<?php
    include("connection.php");

    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];
    $senhaCriptografada = md5($password);

    $sql = "SELECT Cod_Usuario, Senha, Tipo_Usuario FROM Usuario WHERE Email = '$login'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["Senha"] == $senhaCriptografada) {
                session_start();
                $_SESSION["Cod_Usuario"] = $row["Cod_Usuario"];
                $_SESSION["Tipo_Usuario"] = $row["Tipo_Usuario"];
                header("Location: /kabo/perfil/");
            } else {
?>
<script>
    alert("Senha incorreta");
    history.go(-1);
</script>
<?php
            }
        }
    }
    else {
?>
<script>
    alert("Login incorreto");
    history.go(-1);
</script>
<?php
    }
?>
