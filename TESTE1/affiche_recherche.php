<section>


<?php
include "accueil.php";
if($allusers->rowCount() > 0){
 while($user=$allusers->fetch()){
     ?>

    <p> <?php echo $user['nom']; ?> </p>
   

     <?php
 }
}else{

    ?>
				<script>
				alert("AUCUN CONTACT TROUVE  !!!");
				</script>

					<?php
}

?>



</section>