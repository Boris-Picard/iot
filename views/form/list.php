    <table class="table shadow-lg table-responsive">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Type</th>
                <th scope="col">Active</th>
                <th scope="col">Valeur</th>
                <th scope="col">Duration</th>
                <th scope="col">Data_Count</th>
                <th scope="col">Création</th>
                <th scope="col">Last Update</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($lists)) {
                foreach ($lists as $list) { ?>
                    <tr>
                        <th scope="row"><?= $list->name ?></th>
                        <th scope="row"><?= $list->measurement_type ?></th>
                        <td><?= $list->is_operational ? "true" : "false" ?></td>
                        <td><?= $list->module_value ?></td>
                        <td><?= $list->duration ?></td>
                        <td><?= $list->data_count ?></td>
                        <td><?= $list->module_timestamp ?></td>
                        <td><?= $list->updated_at ?></td>
                        <td>
                            <a href="/controllers/form/view-ctrl.php?id=<?= $list->id_modules ?>"><i class="bi bi-eye btn btn-sm btn-light"></i></a>
                            <a href="/controllers/form/update-ctrl.php?id=<?= $list->id_modules ?>"><i class="bi bi-pencil-square btn btn-sm btn-light"></i></a>
                            <a href="/controllers/form/delete-ctrl.php?id=<?= $list->id_modules ?>"><i class="bi bi-trash-fill btn btn-sm btn-danger"></i></a>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>