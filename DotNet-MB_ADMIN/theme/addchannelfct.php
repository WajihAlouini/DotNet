<?php 
include_once 'C:\xampp\htdocs\Dotnet\DotNet-MB_ADMIN\core\configiptv.php';
include_once 'C:\xampp\htdocs\Dotnet\DotNet-MB_ADMIN\core/iptv_channelC.php';
include_once 'C:\xampp\htdocs\Dotnet\DotNet-MB_ADMIN\model\iptv_channel.php';

if(!isset($_POST['id'])||!isset($_POST['nom'])||!isset($_POST['id_cat'])||!isset($_POST['frame'])||!isset($_POST['url']))
{
	echo "erreur de ";
}
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png','jfif'];
                if (in_array($extension, $allowedExtensions))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !.<br>"; 
                      //  echo  'uploads/' . basename($_FILES['screenshot']['name']);
                }
        }
} 



$category=new channel($_POST['id'],$_POST['nom'],$_POST['url'],$_POST['frame'],$_FILES['image']['name'],$_POST['id_cat'],0);


$produitc=new channelC();
$produitc->Ajouterchannel($category);
header('location:http://localhost/wajih/view/back/theme/channel-list.php');
?>