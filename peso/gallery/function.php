<?php
function isActivePage($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage === $pageName) {
        return 'class="active"';
    } else {
        return '';
    }
}
?>
