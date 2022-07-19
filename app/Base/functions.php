<?php

/**
 * Make the view file.
 *
 * @param string $path
 * @param array $data
 *
 * @return void
 */
function views(string $path, array $data = []): void
{
    // Extract the data array to use each value as variable
    extract($data);

    // Start output buffering
    require_once VIEWS . '/' . $path;
}
