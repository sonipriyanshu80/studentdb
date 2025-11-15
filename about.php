<?php 
session_start();
if(isset($_SESSION['user'])){
    $_SESSION['seen_about'] = true;
}
?>
<!DOCTYPE html>
<html>
<head><title>About</title><link rel="stylesheet" href="styles.css"></head>
<body>
<?php include 'header.php'; ?>

<div class="about-section">

    <h2>About Our Student Portal</h2>

    <p class="intro">
        The <strong>BCA Student Portal</strong> is a modern, unified digital platform designed
        to simplify and enhance your academic journey. Whether it’s accessing assignments,
        downloading study materials, reviewing attendance, or managing your profile-everything you need is now in one place.
    </p>

    <h3>🎯 Our Mission</h3>
    <p>
        Our mission is to create an efficient, transparent, and accessible academic environment.
        We empower students through technology by offering a platform that supports learning,
        communication, and personal growth.
    </p>

    <h3>📌 What You Can Do Here</h3>
    <ul class="styled-list">
        <li>📅 View class schedules, attendance, and timetables</li>
        <li>📚 Download notes, assignments, and study materials</li>
        <li>📊 Track internal marks, results & academic performance</li>
        <li>🧑‍🎓 Manage and update your student profile</li>
        <li>🔔 Stay updated with important notices and announcements</li>
        <li>💡 Access e-books, digital resources, and learning tools</li>
    </ul>

    <h3>💡 Why We Built This Portal</h3>
    <p>
        Traditional college communication often depends on scattered WhatsApp messages,
        manual attendance sheets, and outdated notice boards.  
        This portal replaces all that with one organized, professional, digital system.
    </p>

    <p>
        Our goal is to make student life easier, more structured, and stress-free.
        Whether you're checking study material at midnight or tracking your attendance before exams
        this portal is built to support you throughout your BCA journey.
    </p>

    <h3>⭐ Key Features</h3>
    <ul class="styled-list">
        <li><strong>⚡ Fast Login System:</strong> Secure session-based authentication</li>
        <li><strong>📌 Clean Dashboard:</strong> Everything important at a glance</li>
        <li><strong>📱 Mobile Friendly:</strong> Smooth on any device</li>
        <li><strong>🚀 Optimized Performance:</strong> Lightweight, fast-loading & reliable</li>
        <li><strong>🔮 Future Ready:</strong> Built to support notes-sharing, forums & chat modules</li>
    </ul>

    <h3>🤝 Our Commitment</h3>
    <p>
        We’re continuously improving this portal with new features, better performance,
        and a smoother user experience-based on student feedback and evolving academic needs.
    </p>

    <h3>📬 Get in Touch</h3>
    <p>
        Have ideas or suggestions?  
        We’d love to hear from you-your feedback shapes the future of this portal.
    </p>

</div>
<?php include 'footer.php'; ?>
</body>
</html>