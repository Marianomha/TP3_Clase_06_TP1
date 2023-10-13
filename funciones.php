<?php 
function diferenciaActualMinimo($StockAct, $StockMini){
$resta= $StockAct -$StockMini;

if ($resta===10 || $resta<10){

    $color="bg-danger";

}
 else if ($resta>10 && $resta<30){

    $color="bg-warning";

}
else {

    $color="bg-success";

}
return $color;
}
?>


<?php 
function disponibilidadVentaWeb($StockAct, $StockMini){
$resta= $StockAct -$StockMini;

if ($resta===10 || $resta<10){

    $Resp="No se permite venta web";

}
 else {

    $Resp=" Se permite venta web";

}


return $Resp;
}
?>
<?php 
function colorTextoPrecio($StockAct, $StockMini){
$resta= $StockAct -$StockMini;

if ($resta===10 || $resta<10){

    $color="text-danger";

}
 else if ($resta>10 && $resta<30){

    $color="text-warning";

}
else {

    $color="text-success";

}
return $color;
}
?>

<?php 
function carritoEquis($StockAct, $StockMini){
$resta= $StockAct -$StockMini;

if ($resta===10 || $resta<10){

    $Resp="bi bi-cart-x-fill ";

}
 else {

    $Resp="bi bi-cart4";

}


return $Resp;
}
?>

<?php 
function montoMonetario($StockAct, $Precio){
$monto= $StockAct * $Precio;

return $monto;

}
?>
<?php
function cantidadProductoVentaWeb($StockAct, $StockMini){
$resta= $StockAct -$StockMini;

if ($resta===10 || $resta<10){

    $Resp='1';

}
 else {

    $Resp='2';

}


return $Resp;
}

?>