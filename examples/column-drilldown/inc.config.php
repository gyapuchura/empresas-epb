<?

function Conectarse()
{
   if (!($link=mysql_connect("localhost","root","0c00l2008")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("cencap_db",$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}

?>