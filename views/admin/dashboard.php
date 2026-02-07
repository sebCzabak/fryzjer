<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Panel Administratora</h2>
        <span class="badge bg-danger">Tryb Admina</span>
    </div>

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            Zarządzanie Rezerwacjami
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Klient</th>
                        <th>Usługa</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($reservations as $res): ?>
                        <tr>
                            <td><?php echo $res['id']; ?></td>
                            <td>
                                <strong><?php echo htmlspecialchars($res['user_name']); ?></strong><br>
                                <small class="text-muted"><?php echo htmlspecialchars($res['email']); ?></small>
                            </td>
                            <td><?php echo htmlspecialchars($res['service_name']); ?></td>
                            <td><?php echo date('d.m.Y H:i', strtotime($res['reservation_date'])); ?></td>
                            <td>
                                <?php if($res['status'] == 'pending'): ?>
                                    <span class="badge bg-warning text-dark">Oczekująca</span>
                                <?php elseif($res['status'] == 'approved'): ?>
                                    <span class="badge bg-success">Zatwierdzona</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Anulowana</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($res['status'] == 'pending'): ?>
                                    <div class="d-flex gap-2">
                                        
                                        <form action="<?php echo BASE_URL; ?>/admin/status" method="POST">
                                            <input type="hidden" name="reservation_id" value="<?php echo $res['id']; ?>">
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-sm btn-success">✔ OK</button>
                                        </form>

                                        <form action="<?php echo BASE_URL; ?>/admin/status" method="POST">
                                            <input type="hidden" name="reservation_id" value="<?php echo $res['id']; ?>">
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="btn btn-sm btn-danger">✖ Anuluj</button>
                                        </form>

                                    </div>
                                <?php else: ?>
                                    <span class="text-muted small">Brak akcji</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>