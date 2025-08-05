<?php

/**
 * Name: Disable persistent object cache check
 *
 * Opt out for suggesting the persistent object cache.
 * URL: https://developer.wordpress.org/reference/hooks/site_status_should_suggest_persistent_object_cache/
 */

add_filter('site_status_should_suggest_persistent_object_cache', '__return_false');
