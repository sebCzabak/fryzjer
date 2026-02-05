<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Logowanie</h3>
                
                <form action="<?php echo BASE_URL; ?>/login/store" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-100">Zaloguj się</button>
                </form>
                
                <div class="mt-3 text-center">
                    <a href="<?php echo BASE_URL; ?>/register">Nie masz konta? Zarejestruj się</a>
                </div>
            </div>
        </div>
    </div>
</div>