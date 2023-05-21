
<h1>Liste des utilisateurs : </h1>

<ul>
<?php
    foreach($data as $utilisator) {
        echo "<li>". $utilisator->firstname ."</li>";
    }
?>

</ul>