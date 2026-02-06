<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Potwierdź rezerwację
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">Usługa: <?php echo htmlspecialchars($service['name']); ?></h4>
                <p>Cena: <strong><?php echo $service['price']; ?> PLN</strong></p>
                <p class="text-muted small"><?php echo $service['description']; ?></p>

                <hr>

                <form action="<?php echo BASE_URL; ?>/booking/store" method="POST">
                    <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Wybierz termin wizyty:</label>
                        <input type="datetime-local" name="reservation_date" class="form-control" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">Zatwierdź rezerwację</button>
                        <a href="<?php echo BASE_URL; ?>/services" class="btn btn-outline-secondary">Anuluj</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>