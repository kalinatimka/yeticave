<?php
function template ($path, $array) {
    if (file_exists($path)) {
        ob_start();
        require_once($path);
        $html_code = ob_get_clean();
    }
    else {
        $html_code = '';
    }
    return $html_code;
}
