<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 6/<?php echo $maxStep ?></p>
			<h2>Équipement et Matériel</h2>
			<p><b>Armement</b><br>
			C'est l’équipement offensif de votre personnage : de la hache à la fourche en passant par l’arbalète et le poignard, bref tout ce qui fait mal à vos ennemis (et parfois à vos amis aussi).</p>
			<p><b>Protections</b><br>
			C'est l'équipement visant à protéger vos miches des bobos divers de l'aventurier lambda. Du gambison au subligar (ou slip durci protège-bourses), vous noterez ici tout ce qui sert a vous protéger.</p>
			<p><b>Matériel</b><br>
			Cette section couvre tout le reste de l'équipement de votre aventurier : du sac à dos à son outre, en passant par la ficelle et les caleçons.</p>
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseil
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>Il peut être risqué de n'avoir qu'une seule arme.<br>
						Ne vous cantonnez pas à un seul type d'arme.<br>
						Un aventurier est un être vivant, qui tient à ses membres (en règle générale).</p>
				</div>
			</div>
		</div>
		<div class="input__container">	
			<div class="row">
				<div class="col-md text-center">
					Work in progress...
				</div>
			</div>		
		</div>
	</fieldset>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="5"> Retour</button>
	</form>
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="7" form="charactersheet"> Suivant</button>
</div>