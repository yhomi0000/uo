<?php
    class crud{
        public static function conect()
        {
           try {
            $con=new PDO('mysql:localhost=host; dbname=listadeusuarios','root','');
            return $con;
           } catch (PDOException $error1) {
                echo 'Conexion con exito!'.$error1->getMessage();
           }catch (Exception $error2){
                 echo 'Genero error!'.$error2->getMessage();
           }
        }
        public static function Selectdata()
        {
            $data=array();
            $p=crud::conect()->prepare('SELECT * FROM usuarios');
            $p->execute();
           $data=$p->fetchAll(PDO::FETCH_ASSOC);
           return $data;
        }
        public static function eliminar($id)
        {
            $p=crud::conect()->prepare('DELETE FROM usuarios WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        }
public static function userDataPerId($id)
{
    $data=array();
    $p=crud::conect()->prepare('SELECT * FROM usuarios WHERE id=:id');
    $p->bindValue(':id',$id);
    $p->execute();
   $data=$p->fetch(PDO::FETCH_ASSOC);
   return $data;
}




    }





?>