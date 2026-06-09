<?php

require_once 'functions.php';
requireLogin();

$user = getLoggedUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking | Aurora Resort</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="auth-header">
        <h1 class="auth-logo">Aurora Resort</h1>
        <a href="index.php">
            <button class="contact-btn">Main page</button>
        </a>
    </header>

    <div class="booking-page">

        <h2 class="booking-title">BOOKING PAGE</h2>

        <div class="booking-guest">
            <h3>Guest Information</h3>
            <p>Welcome back, <strong><?php echo htmlspecialchars($user['name']); ?></strong></p>
            <p class="booking-sub">Your details are securely saved for a seamless experience.</p>
        </div>

        <?php if (!empty($_GET['welcome'])): ?>
            <div class="auth-success">
                Account created successfully! You can now make a reservation.
            </div>
        <?php endif; ?>

        <?php if (!empty($_GET['confirmed'])): ?>
            <div class="auth-success">
                Your reservation has been confirmed! We look forward to welcoming you.
            </div>
        <?php endif; ?>

        <div class="booking-section">
            <h3>Accommodation Type</h3>

            <div class="room-cards">

                <div class="room-card">
                    <span class="room-label">Deluxe Room</span>
                    <img src="images/deluxe.jpg" alt="Deluxe Room">
                    <p>A refined and comfortable space designed for relaxation.</p>
                </div>

                <div class="room-card">
                    <span class="room-label">Royal Suite</span>
                    <img src="images/Royal_Suite.avif" alt="Royal Suite">
                    <p>An exclusive suite with premium services, and a truly elegant living experience.</p>
                </div>

                <div class="room-card">
                    <span class="room-label">Family Suite</span>
                    <img src="images/amenajare_dormitor.webp" alt="Family Suite">
                    <p>A spacious and cozy suite designed for families, combining comfort, functionality, and elegance.</p>
                </div>

            </div>
        </div>

        <form action="task.php" method="POST" class="booking-form">

            <div class="booking-grid">

                <div class="booking-col">
                    <h4>Select Your Room</h4>
                    <label><input type="checkbox" name="rooms[]" value="Deluxe Room"> Deluxe Room</label>
                    <label><input type="checkbox" name="rooms[]" value="Royal Suite"> Royal Suite</label>
                    <label><input type="checkbox" name="rooms[]" value="Family Suite"> Family Suite</label>
                </div>

                <div class="booking-col">
                    <h4>Guests</h4>
                    <div class="counter-row">
                        <span>Adults</span>
                        <div class="counter">
                            <button type="button" onclick="changeCount('adults', -1)">−</button>
                            <span id="adults-display">0</span>
                            <button type="button" onclick="changeCount('adults', 1)">+</button>
                            <input type="hidden" name="adults" id="adults-val" value="0">
                        </div>
                    </div>
                    <div class="counter-row">
                        <span>Children</span>
                        <div class="counter">
                            <button type="button" onclick="changeCount('children', -1)">−</button>
                            <span id="children-display">0</span>
                            <button type="button" onclick="changeCount('children', 1)">+</button>
                            <input type="hidden" name="children" id="children-val" value="0">
                        </div>
                    </div>
                </div>

                <div class="booking-col">
                    <h4>Check-in &amp; Check-out</h4>
                    <label>Arrival Date
                        <input type="date" name="checkin" required>
                    </label>
                    <label>Departure Date
                        <input type="date" name="checkout" required>
                    </label>
                </div>

            </div>


            <div class="booking-total">
                <span>Estimated Total</span>
                <span id="total-display" class="total-value">—</span>
            </div>

            <button type="submit" class="booking-confirm-btn">Confirm Reservation</button>

        </form>


        <div class="booking-logout">
            <span>If you wish to log out of the site after placing your order</span>
            <a href="logout.php">
                <button class="logout-btn">Log out</button>
            </a>
        </div>

    </div>

    <script>
        function changeCount(type, delta) {
            const display = document.getElementById(type + '-display');
            const input = document.getElementById(type + '-val');
            let val = parseInt(input.value) + delta;
            if (val < 0) val = 0;
            input.value = val;
            display.textContent = val;
        }


        const prices = {
            'Deluxe Room': 150,
            'Royal Suite': 350,
            'Family Suite': 250
        };

        function updateTotal() {
            const checkboxes = document.querySelectorAll('input[name="rooms[]"]:checked');
            const checkin = document.querySelector('input[name="checkin"]').value;
            const checkout = document.querySelector('input[name="checkout"]').value;

            let nights = 0;
            if (checkin && checkout) {
                const d1 = new Date(checkin);
                const d2 = new Date(checkout);
                nights = Math.max(0, (d2 - d1) / (1000 * 60 * 60 * 24));
            }

            let total = 0;
            checkboxes.forEach(cb => {
                total += (prices[cb.value] || 0) * nights;
            });

            document.getElementById('total-display').textContent =
                total > 0 ? '$' + total.toLocaleString() : '—';
        }

        document.querySelectorAll('input[name="rooms[]"]').forEach(cb =>
            cb.addEventListener('change', updateTotal));
        document.querySelectorAll('input[type="date"]').forEach(d =>
            d.addEventListener('change', updateTotal));
    </script>

</body>

</html>