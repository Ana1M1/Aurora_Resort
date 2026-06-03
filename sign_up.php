<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Aurora Resort</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
<!-- HEADER -->
<header class="auth-header">
    <h1 class="auth-logo">Aurora Resort</h1>
    <a href="index.php">
        <button class="contact-btn">Main page</button>
    </a>
</header>
 
<!-- HERO CU FORMULAR -->
<section class="auth-hero">
 
    <img src="images/Hotel_room_nudecolor.jpeg" class="auth-bg-img" alt="">
 
    <div class="auth-card">
 
        <h2 class="auth-title">Sign up</h2>
 
        <!-- Mesaj eroare -->
        <?php if (!empty($_GET['error'])): ?>
            <div class="auth-error">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
 
        <form action="save_data.php" method="POST" class="auth-form">
 
            <input
                type="text"
                name="name"
                placeholder="Full Name"
                required
                value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
            >
 
            <input
                type="email"
                name="email"
                placeholder="Email"
                required
                value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
            >
 
            <input
                type="tel"
                name="phone"
                placeholder="Phone Number"
                value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>"
            >
 
            <div class="auth-password-row">
                <input
                    type="password"
                    name="password"
                    placeholder="Unique password"
                    required
                >
                <button type="submit" class="auth-submit-btn">Sign up</button>
            </div>
 
        </form>
 
        <div class="auth-bottom">
            <span>After you sign up, you can make the reservation.</span>
            <a href="login.php">
                <button class="auth-book-btn">Log in here</button>
            </a>
        </div>
 
    </div>
 
</section>
 
</body>
</html>