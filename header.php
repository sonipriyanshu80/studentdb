<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_page = basename($_SERVER['PHP_SELF']);

$menu_items = [
    "Login"      => "index.php",
    "Register"   => "register.php"
];

if (isset($_SESSION['user'])) {
    $menu_items = array_merge(
        ["Dashboard" => "dashboard.php"],
        $menu_items,
        ["About" => "about.php"]
    );
}

$links = [];
foreach ($menu_items as $label => $file) {
    $is_active = ($file === $current_page) ? 'active' : '';
    $links[] = '<a href="' . htmlspecialchars($file, ENT_QUOTES) . '" class="' . $is_active . '">' . htmlspecialchars($label) . '</a>';
}

$nav_html = implode('', $links);
?>
<header>
    <div class="header-container">
        <h1>BCA Student Portal</h1>
        <nav>
            <?= $nav_html ?>
        </nav>
    </div>
</header>

