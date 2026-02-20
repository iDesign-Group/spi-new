<?php
/**
 * Shree Plastic Industries — Language Loader
 * --------------------------------------------------
 * Include once (guarded). Detects current language
 * from ?lang= GET param or cookie, loads the correct
 * lang/xx.php file, and exposes __t() helper.
 */

if (defined('SPI_LANG_LOADED')) return;
define('SPI_LANG_LOADED', true);

/** All supported languages: code => [name, flag emoji, short label] */
$LANG_LIST = [
    'en' => ['name' => 'English', 'flag' => '&#127468;&#127463;', 'short' => 'EN'],
    'hi' => ['name' => 'हिंदी',   'flag' => '&#127470;&#127475;', 'short' => 'हि'],
    'zh' => ['name' => '中文',     'flag' => '&#127464;&#127475;', 'short' => '中'],
    'es' => ['name' => 'Español', 'flag' => '&#127466;&#127480;', 'short' => 'ES'],
    'ru' => ['name' => 'Русский', 'flag' => '&#127479;&#127482;', 'short' => 'RU'],
];

/** Detect active language (GET param > cookie > default 'en') */
function spi_detect_lang() {
    global $LANG_LIST;
    $allowed = array_keys($LANG_LIST);
    if (!empty($_GET['lang']) && in_array($_GET['lang'], $allowed)) {
        $lang = $_GET['lang'];
        setcookie('spi_lang', $lang, time() + 30 * 24 * 3600, '/');
        return $lang;
    }
    if (!empty($_COOKIE['spi_lang']) && in_array($_COOKIE['spi_lang'], $allowed)) {
        return $_COOKIE['spi_lang'];
    }
    return 'en';
}

/** Load translations array from lang/xx.php */
function spi_load_lang($lang) {
    $file = __DIR__ . '/../lang/' . $lang . '.php';
    if (file_exists($file)) return require $file;
    return require __DIR__ . '/../lang/en.php'; // fallback
}

/**
 * __t('key') — returns translated string for current language.
 * Falls back to English key name if translation missing.
 */
function __t($key, $fallback = '') {
    global $TRANSLATIONS;
    if (isset($TRANSLATIONS[$key])) return $TRANSLATIONS[$key];
    return $fallback !== '' ? $fallback : $key;
}

/**
 * lang_url('hi') — returns current page URL with ?lang=hi
 * Preserves all other existing query params.
 */
function lang_url($lang) {
    $params        = $_GET;
    $params['lang'] = $lang;
    $path          = strtok($_SERVER['REQUEST_URI'], '?');
    return $path . '?' . http_build_query($params);
}

// ── Bootstrap ──────────────────────────────────────
$CURRENT_LANG = spi_detect_lang();
$TRANSLATIONS = spi_load_lang($CURRENT_LANG);
