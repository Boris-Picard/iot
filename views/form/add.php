<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-8">
        <?php if (isset($alert)) { ?>
            <div class="alert alert-success my-3" role="alert">
                <?= $alert['success'] ?>
            </div>
        <?php } ?>
        <div class="d-flex shadow-lg p-5 flex-column rounded-5">
            <form action="" method="post" novalidate>
                <h1 class="text-uppercase text-center fw-bold mb-5">
                    Ajouter un nouveau module
                </h1>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control <?= !empty($errors['name']) ? "is-invalid" : "" ?> <?= isset($valid['name']) ? "is-valid" : "" ?>" name="name" id="name" placeholder="Ex : Capteur de température" value="<?= $name ?? "" ?>" required>
                    <label for="name">Nom<span class="text-danger">*</span></label>
                    <small class="text-danger mx-1"><?= $errors['name'] ?? '' ?></small>
                </div>
                <div class="form-floating mb-4">
                    <textarea type="text" class="form-control <?= !empty($errors['description']) ? "is-invalid" : "" ?> <?= isset($valid['description']) ? "is-valid" : "" ?>" name="description" id="description" placeholder="Capteur de température industriel" required><?= $description ?? "" ?></textarea>
                    <label for="description">Description<span class="text-danger">*</span></label>
                    <small class="text-danger mx-1"><?= $errors['description'] ?? '' ?></small>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control <?= !empty($errors['type']) ? "is-invalid" : "" ?> <?= isset($valid['type']) ? "is-valid" : "" ?>" name="type" id="type" placeholder="Ex: Température" value="<?= $type ?? "" ?>" required>
                    <label for="type">Type de mesure<span class="text-danger">*</span></label>
                    <small class="text-danger mx-1"><?= $errors['type'] ?? '' ?></small>
                </div>
                <button type="submit" class="text-uppercase bg-secondary btn text-white fw-bold w-100 py-3">Ajouter</button>
            </form>
        </div>
    </div>
</div>