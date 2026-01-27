<?php
/**
 * This file explains "The Loop"
 * The Loop is how WordPress displays posts.
 */

// WordPress already fetched posts from DB
$posts = [
    "Post 1: Hello WordPress",
    "Post 2: Learning the Loop",
    "Post 3: Understanding CMS"
];

// This simulates WordPress Loop
foreach ($posts as $post) {
    echo $post . "\n";
}
