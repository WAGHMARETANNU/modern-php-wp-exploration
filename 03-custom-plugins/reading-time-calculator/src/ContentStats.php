<?php
/**
 * Module 01: PHP Fundamentals - OOP Logic
 * Purpose: 
 */

namespace ModernWeb\Logic;

class ContentStats {
    
    // Average reading speed (Words Per Minute)
    private int $wpm = 200; //private access modifier , int = type hinting 

    /**
     * Calculate the word count of a given string.
     */
    public function getWordCount(string $content): int { // strict contract
        // strip_tags is used to ensure we don't count HTML as words
        $cleanContent = strip_tags($content);
        return str_word_count($cleanContent); // built-in function to count words
    }

    /**
     * Estimate reading time in minutes.
     */
    public function getReadingTime(string $content): int {
        $count = $this->getWordCount($content);
        return (int) ceil($count / $this->wpm);
    }
}

// --- Example Usage (You can delete this part before pushing if you want) ---
$analyzer = new ContentStats();
$myText = "Building a JavaScript extension taught me a lot about client-side logic. 
           Now, I am exploring how PHP handles the same data on the server.";

echo "Words: " . $analyzer->getWordCount($myText) . PHP_EOL;
echo "Read Time: " . $analyzer->getReadingTime($myText) . " minute(s)" . PHP_EOL;