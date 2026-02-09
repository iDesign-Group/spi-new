<?php
/**
 * Shree Plastic Industries - Configuration File
 * Site configuration, session handling, and global constants
 */

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site Constants
define('SITE_URL', 'https://shreeplasticindustries.com');
define('SITE_NAME', 'Shree Plastic Industries');
define('SITE_TAGLINE', 'Believe in Yourself');
define('SITE_ESTABLISHED', '1984');
define('SITE_LOCATION', 'Pune, Maharashtra, India');

// Directory paths
define('ROOT_PATH', dirname(__DIR__) . '/');
define('INCLUDES_PATH', ROOT_PATH . 'includes/');
define('PAGES_PATH', ROOT_PATH . 'pages/');
define('ASSETS_PATH', ROOT_PATH . 'assets/');
define('DATA_PATH', ROOT_PATH . 'data/');

// Asset URLs (relative to site root)
define('CSS_URL', 'assets/css/');
define('JS_URL', 'assets/js/');
define('IMAGES_URL', 'assets/images/');

// Contact Information
define('CONTACT_EMAIL', 'info@shreeplasticindustries.com');
define('CONTACT_PHONE', '+91-20-XXXXXXXX');
define('CONTACT_ADDRESS', 'Pune, Maharashtra, India');

/**
 * Get base URL for assets and links
 * @param string $path - relative path to append
 * @return string - full URL path
 */
function getBaseUrl($path = '') {
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    // Handle root level files
    if (basename($_SERVER['SCRIPT_NAME']) === 'index.php' || 
        basename($_SERVER['SCRIPT_NAME']) === 'intro.php') {
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    } else {
        // Handle files in subdirectories
        $base = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/\\');
    }
    return $base . '/' . ltrim($path, '/');
}

/**
 * Get current page name for navigation active state
 * @return string - current page identifier
 */
function getCurrentPage() {
    $script = basename($_SERVER['SCRIPT_NAME'], '.php');
    return $script;
}

/**
 * Check if current page matches given page name
 * @param string $page - page name to check
 * @return bool
 */
function isActivePage($page) {
    return getCurrentPage() === $page;
}

/**
 * Load JSON data from data directory
 * @param string $filename - JSON filename without extension
 * @return array|null - decoded JSON data or null on failure
 */
function loadJsonData($filename) {
    $filepath = DATA_PATH . $filename . '.json';
    if (file_exists($filepath)) {
        $json = file_get_contents($filepath);
        return json_decode($json, true);
    }
    return null;
}

/**
 * Sanitize output for HTML display
 * @param string $string - string to sanitize
 * @return string - sanitized string
 */
function sanitize($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Check if intro has been seen this session
 * @return bool
 */
function hasSeenIntro() {
    return isset($_SESSION['intro_seen']) && $_SESSION['intro_seen'] === true;
}

/**
 * Mark intro as seen
 */
function markIntroAsSeen() {
    $_SESSION['intro_seen'] = true;
}

// Set default timezone
date_default_timezone_set('Asia/Kolkata');

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0); // Set to 1 for development
?>
