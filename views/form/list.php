    <table class="table shadow-lg ">
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
                        <td></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>