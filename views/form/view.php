<?php if (!is_null($moduleStatus || !is_null($getModule))) { ?>
    <div class="row align-items-center">
        <h1 class="text-center mt-5">
            <?= $moduleStatus[0]->name ?>
        </h1>
        <span class="text-center mb-3"><?= $moduleStatus[0]->description ?></span>
        <div class="col-12 col-md-8">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body text-center flex-column d-flex gap-3">
                    <span>Type de données : <?= $moduleStatus[0]->measurement_type ?></span>
                    <span id="operational" class="fw-bold"></span>
                    <span>Derniere donnée : <span id="value"></span></span>
                    <span>Durée de fonctionnement : <span id="duration"></span></span>
                    <span>Nombre de données : <span id="data_count"></span></span>
                    <span>Derniere MAJ : <span id="last_updated"></span></span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>