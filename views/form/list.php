    <table class="table shadow-lg table-responsive">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Localisation</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($lists)) {
                foreach ($lists as $list) { ?>
                    <tr>
                        <th scope="row"><?= $list->name ?></th>
                        <td><?= $list->location ?></td>
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