<?php

function checkValidUrl($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
}