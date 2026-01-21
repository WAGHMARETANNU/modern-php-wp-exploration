<?php
/**
 * Module 01: Unit Test for ContentStats
 * Purpose: To verify logic and handle edge cases.
 */

require_once 'ContentStats.php';
use ModernWeb\Logic\ContentStats;

$tester = new ContentStats(); //object of class ContentStats

// Define Test Cases
$testCases = [                                    // associative array  
    "Simple text" => "This is a simple sentence.", // 5 words
    "HTML text"   => "<p>Hello</p> <b>World</b>!", // 2 words (tags should be stripped)
    "Empty string" => "",                         // 0 words
];

echo "--- Running Logic Tests ---" . PHP_EOL; // adds new line

foreach ($testCases as $description => $content) {
    $wordCount = $tester->getWordCount($content);
    $readTime  = $tester->getReadingTime($content);

    echo "Test: $description" . PHP_EOL;
    echo " - Content: '$content'" . PHP_EOL;
    echo " - Word Count: $wordCount" . PHP_EOL;
    echo " - Read Time: $readTime min" . PHP_EOL;
    echo "---------------------------" . PHP_EOL;
}