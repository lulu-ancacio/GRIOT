<?php
require_once 'supabase.php';

$itens = supabaseRequest("pinturas?select=*");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="meanStyle/assets/images/FavIcon_SF.png">
    <meta name="description" content="Painel Administrativo ">
    <title>GRIOT-Teste</title>
</head>
<body>


<h1>Acervo</h1>

<?php foreach ($itens as $item): ?>
    <div>
        <h2><?php echo $item['titulo']; ?></h2>
        <p><?php echo $item['autor']; ?></p>
        <img src="<?php echo $item['url'];?>" alt="<?php echo $item['titulo']; ?>" width="200">
    </div>
<?php endforeach; ?>

</body>
</html>

