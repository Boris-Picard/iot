<div class="row justify-content-center ">
    <div class="col-12 col-md-8">
        <?php if (isset($alert)) { ?>
            <div class="alert alert-success" role="alert">
                <?= $alert['success'] ?>
            </div>
        <?php } ?>
        <div class="d-flex shadow-lg p-5 flex-column rounded-5">
            <form action="" method="post" novalidate>
                <h1 class="text-uppercase text-center fw-bold mb-5">
                    Ajouter un nouveau module
                </h1>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" name="name" id="name" placeholder="name@example.com">
                    <label for="name">Nom<span class="text-danger">*</span></label>
                    <small class="text-danger mx-1"><?= $errors['name'] ?? '' ?></small>
                </div>
                <div class="form-floating mb-5">
                    <input type="text" class="form-control" name="location" id="location" placeholder="Password">
                    <label for="location">Localisation<span class="text-danger">*</span></label>
                    <small class="text-danger mx-1"><?= $errors['location'] ?? '' ?></small>
                </div>
                <h2 class="text-center mb-5">Mesures</h2>
                <div class="form-floating mb-4">
                    <input type="date" class="form-control" name="date" id="date" placeholder="Password">
                    <label for="date">Date<span class="text-danger">*</span></label>
                    <small class="text-danger mx-1"><?= $errors['date'] ?? '' ?></small>
                </div>
                <button type="submit" class="text-uppercase bg-secondary btn text-white fw-bold w-100 py-3">Ajouter</button>
            </form>
        </div>
    </div>
</div>