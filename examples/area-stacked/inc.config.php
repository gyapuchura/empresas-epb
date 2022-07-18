<?

function Conectarse()
{
   if (!($link=mysql_connect("localhost","root","gonzalo@php")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("minculturas_db",$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}

?>