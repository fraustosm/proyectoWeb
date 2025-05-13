<?php include '../includes/header.php'; ?>
<?php include '../db/connection.php'; ?>

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #6A5ACD;
        --accent-color: #CDC1D9;
        --text-color: #2c3e50;
        --light-bg: #ecf0f1;
        --white: #ffffff;
    }

    body {
        font-family: "Winky Sans", sans-serif;
        font-optical-sizing: auto;
        background-color: var(--light-bg);
        color: var(--text-color);
    }

    .card-producto {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card-producto:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
    .card-producto img {
        height: 400px;
        object-fit: cover;
    }
    .card-producto .card-body {
        text-align: center;
    }
    .card-producto .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    </style>
<main>
    <section class="container">
        <h2 class="text-center">Nuestros Productos</h2>
        
        <div class="row">
            <?php
            $sql = "SELECT id, producto, precio, imagen FROM productos ORDER BY fecha_lanzamiento DESC";
            $result = $conn->query($sql);
            
            if ($result && $result->num_rows > 0) {
                $counter = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($counter % 4 == 0) {
                        echo '</div><div class="row mb-4">'; // Cierra y abre nueva fila cada 4 elementos
                    }
                    ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100 card-producto">
                            <img src="../img/<?= htmlspecialchars($row['imagen']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= htmlspecialchars($row['producto']) 
                                 ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['producto']) ?></h5>
                                <p class="card-text text-success h4">$<?= number_format($row['precio'], 2) ?></p>
                                <a href="Producto.php?id=<?= $row['id'] ?>" class="btn btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++;
                }
            } else {
                echo '<div class="col-12"><div class="alert alert-info">Próximamente nuevos productos!</div></div>';
            }
            ?>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>