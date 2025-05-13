<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - English 2learn</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
    --primary-color: #2c3e50;
    --secondary-color: #6A5ACD;
    --accent-color: #CDC1D9;
    --text-color: #2c3e50;
    --light-bg: #ecf0f1;
    --white: #ffffff;
}

h1 {
    font-family: "Winky Sans", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
        body {
            font-family: "Winky Sans", sans-serif;
            font-optical-sizing: auto;
            background-color: #fdfdfd;
            color: #333;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 2rem;
        }

        h2 {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        p, h3 {
            color: var(--text-color)
        }

        .intro {
            max-width: 800px;
            margin: 0 auto 3rem;
            font-size: 1.1rem;
            line-height: 1.6;
            text-align: center;
        }

        .team-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
        }

        .team-member {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            max-width: 260px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 3px var(--accent-color) solid;
        }

        .team-member h3 {
            margin: 0.5rem 0;
            color: var(--text-color);
        }

        .team-member p {
            font-size: 0.95rem;
            color: #555;
        }

        .social-links {
            margin-top: 0.8rem;
        }

        .social-links a {
            margin: 0 8px;
            color: #555;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .team-grid {
                flex-direction: column;
                align-items: center;
            }
        }

        .lead {
            padding: 2rem 0;
            color: var(--white);
            text-align: center;
        }
    </style>
</head>

<body>
    <main>
    <section class="about-hero">
    <h2>Sobre Nosotros</h2>
    <p class="lead">Conoce más sobre nuestra misión, visión y el equipo que hace posible English2Learn.</p>
</section>

<section class="about-mission">
    <div class="about-grid">
        <div class="about-content">
            <h3>Nuestra Misión</h3>
            <p>Brindar una enseñanza del inglés accesible, efectiva y divertida para todos, sin importar la edad o nivel de conocimiento.</p>
            <h3>Nuestra Visión</h3>
            <p>Ser una plataforma educativa reconocida por su excelencia en la enseñanza del inglés como segunda lengua.</p>

            <h3>Valores</h3>
            <ul>
                <li>✅ Compromiso con el aprendizaje</li>
                <li>✅ Innovación educativa</li>
                <li>✅ Calidad humana y profesional</li>
            </ul>
        </div>
        <div class="about-image">
            <img src="/img/success.jpg" alt="learning" class="benefit-img">
        </div>
    </div>
</section>

<section class="about-mission">
    <div class="about-grid">
        <div class="about-image">
            <img src="/img/success.jpg" alt="mission" class="benefit-img">
        </div>
        <div class="about-content">
            <h3>¿Quiénes Somos?</h3>
            <p>Somos un grupo de docentes especializados en la enseñanza del idioma inglés con más de 10 años de experiencia.</p>
            <h3>Nuestro Compromiso</h3>
            <p>Nos comprometemos a ofrecer cursos de calidad, con materiales propios y atención personalizada.</p>
        </div>
    </div>
</section>
        <section>
            <h2>Sobre Nosotros</h2>
            <p class="intro">En <strong>English 2learn</strong>, nuestra misión es proporcionar educación de calidad para el aprendizaje del inglés de manera efectiva y accesible. Contamos con un equipo de expertos en enseñanza del idioma, materiales innovadores y una plataforma diseñada para que aprendas a tu ritmo.</p>
        </section>

        <section>
            <h2>Detrás de English 2Learn</h2>
            <div class="team-grid">

                <div class="team-member">
                    <img src="../img/photo.jpg" alt="María Frausto" class="picture">
                    <h3>María Frausto</h3>
                    <p>CEO, PM, diseñadora instruccional y desarrolladora web back end</p>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/mfraustofs/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.github.com/fraustosm" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <img src="../img/photo-1.jpg" alt="Vladimir Kolesnikov" class="picture">
                    <h3>Vladimir Kolesnikov</h3>
                    <p>CTO, desarrollador web front end</p>
                    <a href="https://www.linkedin.com/in/vladimir-kolesnikov/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.github.com/vkolesnikov" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                </div>

                <div class="team-member">
                    <img src="../img/tigrilla.jpg" alt="Tigrilla" class="picture">
                    <h3>Tigrilla</h3>
                    <p>Supervisora de calidad</p>
                </div>

            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>

</html>
