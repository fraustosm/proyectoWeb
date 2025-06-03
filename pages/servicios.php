<?php include '../includes/header.php'; ?>
<?php include '../db/connection.php'; ?>


<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #6A5ACD;
        --accent-color: #CDC1D9;
        --text-color: #2c3e50;
        --light-bg: #f8f9fa;
        --white: #ffffff;
    }

    body {
        font-family: "Winky Sans", sans-serif;
        background-color: var(--light-bg);
        color: var(--text-color);
        font-size: medium;
    }


    h1 {
        /*font-size: 2rem;*/
        /* line-height: 1.8; */
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        color: var(--primary-color);
        font-family: "Winky Sans", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
    }
        

    .card-producto {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 12px;
        background-color: var(--white);
        height: 100%;
        overflow: hidden;
    }

    .card-producto:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card-producto img {
        height: 200px;
        object-fit: cover;
        width: 100%;
        display: block;
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1.3rem;
        font-weight: bold;
        color: var(--secondary-color);
        margin: 0;
    }

    .productos-section {
        padding: 40px 0;
    }
</style>

<main>
    <section class="container productos-section">
        <h2>Nuestros Productos</h2>

        <div class="row">
            <?php
            $sql = "SELECT id, producto, precio, imagen FROM productos ORDER BY fecha_lanzamiento DESC";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card card-producto h-100">
                            <img src="../img/<?= htmlspecialchars($row['imagen']) ?>"
                                 alt="<?= htmlspecialchars($row['producto']) ?>"
                                 class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['producto']) ?></h5>
                                <p class="card-text">$<?= number_format($row['precio'], 2) ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="col-12"><div class="alert alert-info text-center">Próximamente nuevos productos.</div></div>';
            }
            ?>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
