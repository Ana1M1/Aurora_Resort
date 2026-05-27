<?php

echo "<h1>Salut! salut!</h1>";

echo "<script>console.log('Mesaj afișat în consolă din PHP');</script>";

?>

<html>

<body>

    <?php
    echo 'Hi!';
    ?>

</body>

</html>

<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$VariabilelePare = 0;
$VariabuleImpare = 0;

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 2 == 0) {
        echo $numbers[$i] . 'Este nr par <br>';
        $VariabilelePare++;
    } else {
        echo $numbers[$i] . 'Este nr impar <br>';
        $VariabuleImpare++;
    }
}
echo '<br>';
echo 'Nr Pare' . $VariabilelePare . '<br>';
echo 'Nr Impare' . $VariabuleImpare;
?>