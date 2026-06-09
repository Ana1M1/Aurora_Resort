<head>
    <link rel="icon" type="image/x-icon" href="/Images/logo-rbg.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Log In | Aurora Resort</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <header class="auth-header">
        <h1 class="auth-logo">Aurora Resort</h1>
        <a href="index.php">
            <button class="contact-btn">Main page</button>
        </a>
    </header>


    <section class="auth-hero">

        <img src="images/clasic-dormitor.webp" class="auth-bg-img" alt="">

        <div class="auth-card">

            <h2 class="auth-title">Log in</h2>


            <?php if (!empty($_GET['error'])): ?>
                <div class="auth-error">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form action="autentificare.php" method="POST" class="auth-form">

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                    value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

                <div class="auth-password-row">
                    <input
                        type="password"
                        name="password"
                        placeholder="Unique password"
                        required>
                    <button type="submit" class="auth-submit-btn">Log in</button>
                </div>

            </form>

            <div class="auth-bottom">
                <span>After you log in, you can make the reservation.</span>
                <a href="dashboard.php">
                    <button class="auth-book-btn">Book here</button>
                </a>
            </div>

        </div>

    </section>

</body>

</html>
