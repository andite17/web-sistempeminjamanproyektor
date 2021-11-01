<div class="container">
    <div class="row my-3">
        <?php foreach ($servo as $ser) : ?>
            <div class="col">
                <div class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h2 class="card-title">Status : <?= $ser['is_active'] ?></h2>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row my-4">
        <form method="POST" action="">
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) : ?>
                    <div class="col">
                        <select class="form-select form-select-sm" name="lemari<?= $i + 1 ?>" aria-label=".form-select-sm example">
                            <option value="1">Terpakai</opiton>
                            <option value="0">Tersedia</option>
                        </select>
                    </div>
                <?php endfor ?>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-outline-primary mt-3">Submit</button>
        </form>
    </div>
</div>