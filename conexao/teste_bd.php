<?php
require 'supabase.php';

$itens = supabaseRequest("pinturas?select=*");
?>

<!DOCTYPE html>
<html>
<body>

<h1>Acervo</h1>

<?php foreach ($itens as $item): ?>
    <div>
        <h2><?php echo $item['titulo']; ?></h2>
        <p><?php echo $item['autor']; ?></p>
        <img src="<?php echo $item['url'];?>">
    </div>
<?php endforeach; ?>

</body>
</html>

