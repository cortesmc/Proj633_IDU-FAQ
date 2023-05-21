
<style>
	<?php include 'css/utilisator/connexion.css'; ?>
</style>

<form method='post' action='' class="form_utilisator form_utilisator_connexion">

	<input  type='hidden'
			name='route'
			value='addUtilisator'/>

	<h1 id="title">Connexion</h1> <br>

	<div id="container_info">

		<div class="ligne">
			<h2 for="email" class="form_el">Email:</h2><br>
			<input type="text" id="email" name="email" class="textArea"><br>
		</div>

		<div class="ligne">
			<h2 for="password" class="form_el">Mdp:</h2><br>
			<input type="password" id="password" name="password" class="textArea"><br>
		</div>


		<input type="submit" value="Ajouter" class="button">
		<a href="?route=createAccount" class="button">Créer un compte</a>
	</div>


</form>