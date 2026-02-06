<h2 class="mb-4 text-center">Nasze Usługi</h2>

<div class="row">
    <?php if (count($services) > 0): ?>
        
        <?php foreach($services as $service): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
                        <h5 class="m-0"><?php echo htmlspecialchars($service['name']); ?></h5>
                        <span class="badge bg-warning text-dark fs-6">
                            <?php echo number_format($service['price'], 2); ?> PLN
                        </span>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <p class="card-text text-muted">
                            <?php echo htmlspecialchars($service['description']); ?>
                        </p>
                        
                        <div class="mt-auto text-end">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <a href="<?php echo BASE_URL; ?>/booking/create?service_id=<?php echo $service['id']; ?>" 
                                   class="btn btn-outline-success">
                                    Rezerwuj termin
                                </a>
                            <?php else: ?>
                                <a href="<?php echo BASE_URL; ?>/login" class="btn btn-sm btn-outline-secondary">
                                    Zaloguj się, aby zarezerwować
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="alert alert-info text-center">
            Aktualnie nie mamy żadnych usług. Zajrzyj później!
        </div>
    <?php endif; ?>
</div>