<?php

declare(strict_types=1);

namespace Arcesilas\MdWordCount;

class MdWordCount
{
    private static $patterns = [
        // Footnotes
        '`^\[[^]]*\][^(].*`m',
        // Indented blocks of code
        '`^( {4,}).*`m',
        // Custom header IDs
        '`{#.*}`',
        // Remove images
        '`!\[[^\]]*\]\([^)]*\)`',
        # Remove HTML tags
        '`</?[^>]*>`',
        // Remove special characters
        '`[#*\`~\-–^=<>+|/:]`',
        // Remove footnote references
        '`\[[0-9]*\]`',
        // Remove enumerations
        '`[0-9#]*\.`',
        // Remove links
        '`\[([^\]]*)\]\([^)]*\)`'
    ];

    private static $replacements = ['', '', '', '', '', '', '', '', '$1'];

    final public static function fromString(string $markdown): int
    {
        return str_word_count(preg_replace(self::$patterns, self::$replacements, $markdown));
    }

    final public static function fromFile(?string $file)
    {
        if (null === $file || ! file_exists($file) || is_dir($file)) {
            return false;
        }
        return self::fromString(file_get_contents($file));
    }
}
