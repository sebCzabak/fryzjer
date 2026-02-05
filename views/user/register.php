<?php $content = '
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title text-center">Rejestracja</h3>
                <form action="/fryzjer/register/store" method="POST" id="registerForm">
                    <div class="mb-3">
                        <label class="form-label">Imię i Nazwisko</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Zarejestruj się</button>
                </form>
            </div>
        </div>
    </div>
</div>
'; ?>