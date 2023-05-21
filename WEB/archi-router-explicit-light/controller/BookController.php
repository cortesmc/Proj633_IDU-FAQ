<?php

$data = null;

class BookController {

    
	// -- Afficher tous les livres
	public function displayAllBook() {
		// -- DATA
		global $data;
		$data = Book::all();	

		// -- VIEWS
		include_once "view/parts/header.php";
		include_once "view/book/displayAllBook.php";
		include_once "view/parts/footer.php";
	}

	public function addBook() {
		if (isset($_GET["title"]) && 
		isset($_GET["year"])) {

			$book = Book::create();
			$book->title = $_GET["title"];
			$book->year = $_GET["year"];
			$book->save();

            
			header("Location: ?route=books");			

		} else {
			include_once "view/parts/header.php";
			include_once "view/book/addFormBook.php";
			include_once "view/parts/footer.php";
		}
	}



	// ----------- BROUILLON
	// public function add() {
	// 	if (isset($_GET["namebrassery"]) && 
	// 		isset($_GET["country"])) {

	// 		$brassery = Brassery::create();
	// 		$brassery->namebrassery = $_GET["namebrassery"];
	// 		$brassery->country = $_GET["country"];
	// 		$brassery->save();

    //         // var_dump($brassery);

	// 		header("Location: ?route=brassery");			

	// 	} else {
	// 		include_once "view/header.php";
	// 		include_once "view/addFormBrassery.php";
	// 		include_once "view/footer.php";
	// 	}
	// }


	// public function single() {
	// 	global $data;
	// 	$data = Brassery::getByID($_GET["id"]);
	// 	include_once "view/header.php";
	// 	include_once "view/singleBrassery.php";
	// 	include_once "view/footer.php";
	// }


}
