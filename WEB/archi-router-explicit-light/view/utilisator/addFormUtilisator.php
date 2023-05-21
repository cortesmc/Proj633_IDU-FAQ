
<style>
	<?php include 'css/utilisator/connexion.css'; ?>
</style>

<form method='post' action='' class="form_utilisator form_utilisator_create_account">

	<input  type='hidden'
			name='route'
			value='addUtilisator'/>

	<h1 id="title">Creation de compte</h1> <br>

	<div id="container_info">
		<div class="ligne">
			<h2 for="firstname" class="form_el">Prenom</h2><br>
			<input type="text" id="firstname" name="firstname" class="textArea"><br>
		</div>

		<div class="ligne">
			<H2 for="lastname" class="form_el">Nom:</H2><br>
			<input type="text" id="lastname" name="lastname" class="textArea"><br>
		</div>

		<div class="ligne">
			<H2 for="email" class="form_el">Email:</H2><br>
			<input type="text" id="email" name="email" class="textArea"><br>
		</div>

		<div class="ligne">
			<H2 for="password" class="form_el">Mdp:</H2><br>
			<input type="password" id="password" name="password" class="textArea"><br>
		</div>


		<input type="submit" value="Créer" class="button">
		<a href="?route=connexionUtilisator" class="button">Se connecter</a>
	</div>


</form>