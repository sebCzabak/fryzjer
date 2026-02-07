<div class="p-5 mb-4 bg-dark text-white rounded-3 shadow" 
     style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&q=80&w=2074'); background-size: cover; background-position: center;">
    
    <div class="container-fluid py-5 text-center">
        <h1 class="display-4 fw-bold">Fryzjero</h1>
        <p class="col-md-8 fs-4 mx-auto">Profesjonalne strzyżenie męskie i stylizacja brody. <br>Zarezerwuj swój termin online w 3 minuty.</p>
        
        <div class="mt-4">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="btn btn-warning btn-lg px-4 gap-3 fw-bold" href="<?php echo BASE_URL; ?>/services">
                    📅 Umów wizytę teraz
                </a>
            <?php else: ?>
                <a class="btn btn-primary btn-lg px-4 gap-3" href="<?php echo BASE_URL; ?>/register">
                    Załóż konto
                </a>
                <a class="btn btn-outline-light btn-lg px-4" href="<?php echo BASE_URL; ?>/login">
                    Zaloguj się
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row align-items-md-stretch mt-5">
    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body p-4 bg-light rounded-3">
                <h2 class="text-dark">✂️ Mistrzowskie Cięcie</h2>
                <p class="card-text">Nasi barberzy to doświadczeni specjaliści, którzy zadbają o każdy detal Twojej fryzury. Używamy tylko najlepszych kosmetyków.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 text-white bg-dark rounded-3">
                <h2>⚡ Szybka Rezerwacja</h2>
                <p class="card-text">Zapomnij o dzwonieniu. Dzięki naszemu systemowi sprawdzisz dostępne terminy i zarezerwujesz wizytę jednym kliknięciem, 24/7.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body p-4 bg-light rounded-3">
                <h2 class="text-dark">💰 Dobre Ceny</h2>
                <p class="card-text">Oferujemy konkurencyjne ceny i program lojalnościowy dla stałych klientów. Sprawdź nasz cennik usług.</p>
                <a href="<?php echo BASE_URL; ?>/services" class="btn btn-outline-dark mt-2">Zobacz cennik</a>
            </div>
        </div>
    </div>
</div>