<?php require_once APPROOT.'/views/inc/header.php';?>

<div class="shell">
    <section class="left">
        <div class="brand">
            <div class="logo">•</div>
            <div>coachpro</div>
        </div>

        <h1>Welcome back</h1>
        <p class="sub">Log in to continue to Coach Pro.</p>

        <form id="loginForm"  method="post">
            <div class="field">
                <label for="email">Email</label>
                <input class="input<?= (!empty($data['email_err'])) ? ' is-invalid' : ''; ?>" value="<?= $data['email']; ?>" id="email" name="email" type="email" >
                <span class="invalid-feedback"><?= $data['email_err'] ?></span>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <input class="input<?= (!empty($data['email_err'])) ? ' is-invalid' : ''; ?>" value="<?= $data['email']; ?>" id="password" name="password" type="password" required>
                    <button type="button" class="toggle-eye" id="togglePwd" aria-label="Show/Hide password">👁️</button>
                    <span class="invalid-feedback"><?= $data['password_err'] ?></span>

                </div>
            </div>

            <div class="row-between">
                <label class="check">
                    <input type="checkbox" name="remember" value="1">
                    Remember me
                </label>

                <a class="link" href="#">Forgot password?</a>
            </div>

            <button class="btn btn-primary" type="submit">Log in</button>

            <div class="divider">or</div>

            <button class="btn btn-ghost" type="button">Continue with Google</button>

            <div class="foot">
                Don’t have an account? <a class="link" href="#">Sign up</a>
            </div>
        </form>
    </section>

    <aside class="right">
        <div class="hero">
            <h2>Train smarter. Connect faster.</h2>
            <p>
                Access your dashboard, manage sessions, and keep your progress in one place.
            </p>
            <div class="dots" aria-hidden="true">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </aside>
</div>

<script>
    // Optional. If you already have this in your JS file, remove this script.
    const toggle = document.getElementById("togglePwd");
    const pwd = document.getElementById("password");
    if (toggle && pwd) {
        toggle.addEventListener("click", () => {
            pwd.type = (pwd.type === "password") ? "text" : "password";
        });
    }
</script>
<?php require_once APPROOT.'/views/inc/footer.php';?>