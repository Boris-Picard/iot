<?php if(!is_null($moduleStatus || $getModule)) { ?>
    <div class="row align-items-center">
        <h1 class="text-center mt-5">
            <?= $moduleStatus[0]->name ?>
        </h1>
        <span class="text-center mb-3"><?= $moduleStatus[0]->description ?></span>
        <div class="col-8">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body text-center flex-column d-flex gap-3">
                    <span>Type de données : <?= $moduleStatus[0]->measurement_type ?></span>
                    <?php if ($moduleStatus[0]->is_operational) { ?>
                        <span class="text-success fw-bold">En fonction</span>
                    <?php } else { ?>
                        <span class="text-danger fw-bold">Ne fonctionne pas</span>
                    <?php } ?>
                    <span>Derniere donnée : <?= $getModule[0]->module_value ?></span>
                    <span>Durée de fonctionnement : <?= $moduleStatus[0]->duration ?></span>
                    <span>Nombre de données : <?= $moduleStatus[0]->data_count ?></span>
                    <span>Derniere MAJ : <?= $moduleStatus[0]->updated_at ?></span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>