<?php

// MySQL-ға қосылу
$host = "localhost";
$user = "root";
$password = "";
$database = "turkistan";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Дерекқорға қосылу қатесі: " . $conn->connect_error);
}

// Форма жіберілген кезде
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $stmt = $conn->prepare(
        "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>
                alert('Хабарламаңыз сәтті жіберілді!');
              </script>";
    } else {
        echo "<script>
                alert('Қате пайда болды!');
              </script>";
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="kk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Түркістан қаласы</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- HEADER -->

<header>

    <div class="logo">
        TURKISTAN
    </div>

    <nav>
        <a href="#home">Басты бет</a>
        <a href="#about">Түркістан</a>
        <a href="#places">Көрікті жерлер</a>
        <a href="#history">Тарихы</a>
        <a href="#contact">Байланыс</a>
    </nav>

</header>


<!-- БАС БЕТ -->

<section class="hero" id="home">

    <div class="hero-content">

        <h1>ТҮРКІСТАН</h1>

        <p>
            Түркі әлемінің рухани астанасы
        </p>

        <a href="#about" class="btn">
            Толығырақ
        </a>

    </div>

</section>


<!-- ТҮРКІСТАН ТУРАЛЫ -->

<section class="about" id="about">

    <h2>Түркістан туралы</h2>

    <div class="about-container">

        <div class="about-text">

            <h3>Ежелгі әрі қасиетті қала</h3>

            <p>
                Түркістан — Қазақстанның оңтүстігінде орналасқан
                көне тарихи қала. Ол қазақ халқының және жалпы
                түркі халықтарының тарихында ерекше орын алады.
            </p>

            <p>
                Қала Ұлы Жібек жолы бойында орналасып,
                сауда мен мәдениеттің маңызды орталығы болған.
            </p>

            <p>
                Бүгінде Түркістан Қазақстанның маңызды
                туристік және рухани орталықтарының бірі болып саналады.
            </p>

        </div>

        <div class="about-info">

            <div class="info-box">
                <h3>📍 Орналасуы</h3>
                <p>Қазақстан, Түркістан облысы</p>
            </div>

            <div class="info-box">
                <h3>🏛️ Мәдениеті</h3>
                <p>Тарихи және рухани орталық</p>
            </div>

            <div class="info-box">
                <h3>🌍 Туризм</h3>
                <p>Қазақстанның танымал туристік қаласы</p>
            </div>

        </div>

    </div>

</section>


<!-- КӨРІКТІ ЖЕРЛЕР -->

<section class="places" id="places">

    <h2>Түркістанның көрікті жерлері</h2>

    <div class="cards">

        <div class="card">

            <div class="card-image image1"></div>

            <h3>Қожа Ахмет Ясауи кесенесі</h3>

            <p>
                Түркістандағы ең танымал тарихи
                және сәулеттік ескерткіштердің бірі.
            </p>

        </div>


        <div class="card">

            <div class="card-image image2"></div>

            <h3>Керуен Сарай</h3>

            <p>
                Заманауи туристік кешен.
                Мұнда қонақтар демалып,
                ойын-сауық орындарына бара алады.
            </p>

        </div>


        <div class="card">

            <div class="card-image image3"></div>

            <h3>Түркістан тарихи орталығы</h3>

            <p>
                Қаланың тарихи және мәдени
                орындары орналасқан ерекше аймақ.
            </p>

        </div>

    </div>

</section>


<!-- ТАРИХЫ -->

<section class="history" id="history">

    <h2>Түркістан тарихы</h2>

    <div class="history-content">

        <p>
            Түркістан — тарихы терең қала. Ежелгі кезеңдерден
            бастап бұл аймақ Орталық Азиядағы маңызды мәдени
            және сауда орталықтарының бірі болған.
        </p>

        <p>
            Қала бұрын Ясы деген атаумен белгілі болған.
            Кейін Түркістан атауы кеңінен қолданыла бастады.
        </p>

        <p>
            Түркістан Қожа Ахмет Ясауидің өмірі мен
            қызметімен тығыз байланысты. Сондықтан қала
            түркі халықтарының рухани өмірінде ерекше орын алады.
        </p>

    </div>

</section>


<!-- ҚЫЗЫҚТЫ ДЕРЕКТЕР -->

<section class="facts">

    <h2>Қызықты деректер</h2>

    <div class="facts-container">

        <div class="fact">
            <strong>Ясы</strong>
            <span>қаланың тарихи атауы</span>
        </div>

        <div class="fact">
            <strong>UNESCO</strong>
            <span>әлемдік мәдени мұра</span>
        </div>

        <div class="fact">
            <strong>Түркістан</strong>
            <span>рухани орталық</span>
        </div>

    </div>

</section>


<!-- БАЙЛАНЫС -->

<section class="contact" id="contact">

    <h2>Бізбен байланыс</h2>

    <form method="POST" action="index.php">

        <input
            type="text"
            name="name"
            placeholder="Аты-жөніңіз"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
        >

        <textarea
            name="message"
            placeholder="Хабарламаңызды жазыңыз..."
            required
        ></textarea>

        <button type="submit">
            Жіберу
        </button>

    </form>

</section>


<!-- FOOTER -->

<footer>

    <h3>TURKISTAN</h3>

    <p>
        Түркістан — тарих пен мәдениеттің мекені
    </p>

    <p>
        © 2026 Түркістан ақпараттық сайты
    </p>

</footer>


<script src="script.js"></script>

</body>
</html>
```
