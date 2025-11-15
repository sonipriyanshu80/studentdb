<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$is_logged_in = isset($_SESSION['user']);
?>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-brand">
            <h2>BCA Student Portal</h2>
            <p>Our mission is to help students manage their academic records efficiently and stay organized throughout their learning journey.</p>
        </div>

        <div class="footer-columns">
            <div class="footer-col">
                <h3>Quick Links</h3>
                <?php if ($is_logged_in): ?>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="about.php">About</a>
                <?php endif; ?>
                <a href="index.php">Login</a>
                <a href="register.php">Register</a>
            </div>

            <div class="footer-col">
                <h3>Resources</h3>
                <a href="#">Help Center</a>
                <a href="#">Student Guide</a>
                <a href="#">FAQs</a>
                <a href="#">Support</a>
            </div>

            <div class="footer-col">
                <h3>Departments</h3>
                <a href="#">Computer Science</a>
                <a href="#">Information Technology</a>
                <a href="#">Business Administration</a>
                <a href="#">Data Science</a>
            </div>

            <div class="footer-col">
                <h3>Contact</h3>
                <a href="#">Email Us</a>
                <a href="#">Report an Issue</a>
                <a href="#">Feedback</a>
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© <?= date('Y') ?> BCA Student Portal. All rights reserved.</p>
        <p>Building student success, one record at a time.</p>
    </div>
</footer>
