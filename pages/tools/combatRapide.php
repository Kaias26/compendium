<div class="starter-template">
    <h1 class="mt-5">Aide au Combat Rapide</h1>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Colonne Joueurs -->
        <div class="col-md-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Joueurs</h2>
                <button id="add-player" class="btn btn-primary">Ajouter Joueur</button>
            </div>
            <div id="player-cards" class="cards-container">
                <!-- Les cartes des joueurs seront injectées ici -->
            </div>
        </div>

        <!-- Colonne Résultats -->
        <div class="col-md-3 text-center">
            <h2>Résultats</h2>
            <div id="results-container" class="results-container p-3 border rounded">
                <p>Sélectionnez un joueur et un adversaire pour voir les résultats.</p>
            </div>
        </div>

        <!-- Colonne Adversaires -->
        <div class="col-md-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Adversaires</h2>
                <button id="add-opponent" class="btn btn-danger">Ajouter Adversaire</button>
            </div>
            <div id="opponent-cards" class="cards-container">
                <!-- Les cartes des adversaires seront injectées ici -->
            </div>
        </div>
    </div>
</div>