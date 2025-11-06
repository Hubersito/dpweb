
<?php
// Vista simple para mostrar los productos en grid.
// Incluye tu header/plantilla según tu proyecto.
// Asegúrate que la variable PHP base_url (o constante) exista y coincida con la que usa JS.
$base = defined('BASE_URL') ? BASE_URL : '/'; // ajustar según tu proyecto
?>
<div class="container py-3">
    <h2>Productos</h2>
    <div id="productos_grid" class="row g-2">
        <!-- El contenido se rellenará desde JS -->
    </div>
</div>

<script>
    // Proporciona base_url al JS. Ajusta si tu proyecto ya lo define en otro lado.
    var base_url = '<?php echo $base; ?>';
</script>
<script src="<?php echo $base; ?>view/function/producto.js"></script>