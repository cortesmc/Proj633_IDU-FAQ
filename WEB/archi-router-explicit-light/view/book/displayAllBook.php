

<h1>La liste de tous les livres :</h1>
<ul>
<?php 

    foreach($data as $book) {
        echo "<li>". $book->title ."</li>";
    }

?>

</ul>