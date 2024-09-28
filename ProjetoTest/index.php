<?php
$servername = "localhost";
$database = "projetovet";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Sample text
$sample = "Além de ser uma clínica veterinária de confiança, também contamos com um completo petshop e farmácia. Nosso petshop oferece uma ampla seleção de produtos de alta qualidade, desde alimentos balanceados e petiscos deliciosos até brinquedos divertidos e acessórios elegantes para o seu pet. Na nossa farmácia, você encontrará uma variedade de medicamentos, produtos de cuidados e suplementos recomendados pelos nossos veterinários, garantindo que o bem-estar e a saúde do seu amado pet estejam sempre em boas mãos. Tudo o que você precisa para cuidar e mimar o seu pet está aqui, no nosso petshop e farmácia, com a mesma dedicação e qualidade que nos tornou referência na área veterinária.";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['textopag'])) {
    $textoPag = mysqli_real_escape_string($conn, $_POST['textopag']);
    
    if (empty(trim($textoPag))) {
        $textoPag = $sample;
    }

    $sql = "SELECT * FROM config_site WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Update existing record
        $sql = "UPDATE config_site SET texto = '$textoPag' WHERE id = 1";
        mysqli_query($conn, $sql);
    } else {
        // Insert new record
        $sql = "INSERT INTO config_site (id, texto) VALUES (1, '$textoPag')";
        mysqli_query($conn, $sql);
    }

    $sample = $textoPag;
} else {
    // Fetch existing record
    $sql = "SELECT texto FROM config_site WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $sample = $row['texto'];
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PetLife</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Garanta uma vida longa e cheia de alegria para o seu melhor amigo">

    <!-- Cascading Style Sheets -->
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="img/logo-white.svg" alt="PetLife">
        </a>
        <nav>
            <a href="#inicio">Início</a>
            <a href="#clinica">Clinica</a>
            <a href="#farmacia">Farmácia</a>
            <a href="#duvidas">Dúvidas</a>
        </nav>
    </header>

    <main>
        <!-- Other sections... -->

        <section id="farmacia">
            <h2>Venha conferir o nosso petshop e farmácia</h2>
            <img src="img/shop-img.svg" alt="" width="645" height="430" loading="lazy">
            <form action="index.php" method="post">
                <textarea id="textopag" name="textopag" rows="10" cols="150"><?php echo htmlspecialchars($sample); ?></textarea>
                <br><br>
                <input type="submit" value="Submit">
            </form>
        </section>

        <section id="duvidas">
            <img src="img/faq-img.svg" alt="" width="540" height="540" loading="lazy">

            <div>
                <h2>Ficou alguma dúvida?</h2>

                <div class="duvida">
                    <h3>Quais serviços são oferecidos pela clínica da PetLife</h3>
                    <img src="img/arrow-down.svg" alt="">
                    <p class = "paragrafo">A clínica da PetLife oferece uma ampla gama de serviços, incluindo consultas de rotina,
                        vacinação, cirurgias, tratamento de doenças, cuidados odontológicos, atendimento de emergência
                        24 horas, programas de prevenção de pulgas, carrapatos e vermes, entre outros. Nosso objetivo é
                        fornecer cuidados abrangentes e personalizados para garantir a saúde e o bem-estar do seu</p>
                        
                </div>
                <div class="duvida">
                    <h3>Quais espécies de animais a clínica veterinária atende?</h3>
                    <img src="img/arrow-down.svg" alt="">
                    <p class = "paragrafo">
                        A clínica veterinária da PetLife atende animais de estimação de todas as espécies, incluindo
                        cães, gatos, pássaros, roedores e répteis. Nossos profissionais possuem conhecimento e
                        experiência para cuidar de diferentes tipos de animais, oferecendo um atendimento especializado
                        e dedicado a cada um deles.
                    </p>
                </div>
                <div class="duvida">
                    <h3>A clínica da PetLife possui serviços de emergência?</h3>
                    <img src="img/arrow-down.svg" alt="">
                    <p class = "paragrafo">
                        Sim, a clínica veterinária da PetLife oferece serviços de emergência 24 horas. Se o seu animal
                        de estimação precisar de atendimento veterinário imediato fora do horário de expediente, nossa
                        equipe está pronta para ajudar, fornecendo cuidados urgentes e tratamento adequado para garantir
                        o bem-estar do seu pet.
                    </p>
                </div>
                <div class="duvida">
                    <h3>A clínica oferece serviços de banho e tosa?</h3>
                    <img src="img/arrow-down.svg" alt="">
                    <p class = "paragrafo">
                        Sim, a clínica veterinária da PetLife oferece serviços profissionaisde banho e tosa. Nossa
                        equipe de profissionais experientes garante que seu pet receba cuidados adequados, usando
                        produtos de alta qualidade e técnicas seguras. O banho e tosa ajudam a manter a higiene, a saúde
                        da pele e pelagem do seu pet, além de proporcionar uma experiência relaxante e agradável para
                        eles.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div>
            <img src="img/logo.svg" alt="PetLife">
            <p >Cuidando com amor, vivendo com alegria: PetLife, onde a vida dos pets é mais feliz!</p>
        </div>

        <div>
            <Strong class="titulo">Links rápidos</Strong>
            <nav>
                <a href="#inicio">Início</a>
                <a href="#clinica">Clinica</a>
                <a href="#farmacia">Farmácia</a>
                <a href="#duvidas">Dúvidas</a>
            </nav>
        </div>

        <div>
            <strong class="titulo">Encontre-nos</strong>
            <p>Whatsapp: <a href="https://wa.me/5522987654321" target="_blank">(22) 98765-4321</a></p>
            <p>Email: <a href="mailto:contato@petlife.com">contato@petlife.com </a></p>
            <p>Endereço: Av. 7 de setembro, nº 42, Centro</p>
        </div>
    </footer>
    <div id="copyright">
        Desenvolvido por <a href="https://github.com/Pedro-GHOS" target="_blank">@PedroHOS</a>
    </div>

    
  <script src="index.js"></script>
</body>

</html>