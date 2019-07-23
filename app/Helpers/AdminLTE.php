<?php

/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
/**
 * Author: Trung Hong Ta <dev@trung.ml>
 */
if(!function_exists('setActive')){
    function setActive($name, $index)
    {
        return (Request::segment($index) == $name) ? "active" : "";
    }
}
