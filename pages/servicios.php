<?php include '../includes/header.php'; ?>
<?php include '../db/connection.php'; ?>

<main>
    <section class="container my-5">
        <h2 class="text-center mb-4">Nuestros Productos</h2>
        
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
                                 alt="<?= htmlspecialchars($row['producto']) ?>">
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