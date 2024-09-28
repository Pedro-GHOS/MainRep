<?php
$servername = "localhost";
$database = "projetovet";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$sample = "Além de ser uma clínica veterinária de confiança, também contamos com um completo petshop e farmácia.
                Nosso petshop oferece uma ampla seleção de produtos de alta qualidade, desde alimentos balanceados e
                petisocs deliciosos até brinquedos divertidos e acessórios elegantes para o seu pet. Na nossa farmácia,
                você encontrará uma variedade de medicamentos, produtos de cuidados e suplementos recomendados pelos
                nossos veterinários, garantindo que o bem-estar e a saúde do seu amado pet estejam sempre em boas mãos.
                Tudo o que você precisa para cuidar e mimar o seu pet está aqui, no nosso petshop e farmácia, com a
                mesma dedicação e qualidade que nos tornou referência na área veterinária.";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 
    $textoPag = $_POST['textopag']; 
    $sql = "SELECT * FROM config_site where id = 1";

    $result = mysqli_query($conn, $sql);
    // $textoPag = $_POST['textoPag'];
    // $insert = "insert into config_site (texto) values ('$textoPag')";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["texto"];
            echo "<br>";
        }
        $sample = $textoPag;
        $sql = "UPDATE config_site SET texto = '$textoPag'";
        mysqli_query($conn, $sql);
        echo "show";
    } 
    else {  
        isset($_POST['textopag']);
        
        $sql = "INSERT INTO config_site (id, texto) VALUES (1, '$textoPag')";

            if (mysqli_query($conn, $sql)) {
                echo "Registro criado com sucesso";
//             } else {
//                 echo "Error: echo 1 " . $sql . "<br>" . mysqli_error($conn);
//             }
//      else {
//         echo "Form data not received.";
//     }
}
}
// Fetch existing records



    
   
   
    
    
    
    
       


    

mysqli_close($conn);




// echo $_POST['textopag'];
// $textoPag = $_POST['textopag'];
//     // echo $textoPag;
// $sql = "INSERT INTO config_site (texto) VALUES ('.$textoPag.')";

// if (mysqli_query($conn, $sql)) {
//       echo "New record created successfully";
// } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
// mysqli_close($conn);
?>

<!DOCTYPE html>
<html">
      <p><?= htmlspecialchars($sample); ?>.</p>
</body>
</html>