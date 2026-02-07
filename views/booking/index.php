<div class="container mt-4">
    <h2 class="mb-4">Moje Rezerwacje</h2>

    <?php if (count($reservations) > 0): ?>
        <div class="card shadow">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Usługa</th>
                            <th>Data i Godzina</th>
                            <th>Cena</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($reservations as $item): ?>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($item['service_name']); ?></strong>
                                </td>
                                <td>
                                    <?php 
                                        
                                        echo date('d.m.Y H:i', strtotime($item['reservation_date'])); 
                                    ?>
                                </td>
                                <td><?php echo $item['price']; ?> PLN</td>
                                <td>
                                    <?php 
                                    
                                    switch($item['status']) {
                                        case 'approved':
                                            echo '<span class="badge bg-success">Zatwierdzona</span>';
                                            break;
                                        case 'cancelled':
                                            echo '<span class="badge bg-danger">Anulowana</span>';
                                            break;
                                        default: 
                                            echo '<span class="badge bg-warning text-dark">Oczekująca</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            Nie masz jeszcze żadnych rezerwacji. 
            <a href="<?php echo BASE_URL; ?>/services">Umów wizytę teraz!</a>
        </div>
    <?php endif; ?>
</div>