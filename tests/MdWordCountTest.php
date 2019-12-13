<?php

declare(strict_types=1);

namespace Arcesilas\MdWordCount\Tests;

use Arcesilas\MdWordCount\MdWordCount;
use PHPUnit\Framework\TestCase;

class MdWordCountTest extends TestCase
{
    public function markdownProvider()
    {
        return [
            'Simple text'  => ['simple-text.md', 4],
            'Headings'     => ['headings.md', 8],
            'Inline'       => ['inline.md', 6],
            'Quote'        => ['quote.md', 1],
            'Enumeration'  => ['enumeration.md', 4],
            'Bullet list'  => ['bullet-list.md', 2],
            'Code block'   => ['code-block.md', 1],
            'Link'         => ['link.md', 3],
            'Image'        => ['image.md', 2],
            'Footnote'     => ['footnote.md', 10],
            'Html tags'    => ['html-tags.md', 3],

            // str_word_count counts `Item 1` as 1 word (does not count `1`)
            'Complete doc' => ['complete.md', 41],
        ];
    }

    /** @dataProvider markdownProvider */
    public function testMdWordCount(string $file, int $count)
    {
        $markdown = file_get_contents(__DIR__ . "/markdown/{$file}");
        $this->assertSame($count, MdWordCount::fromString($markdown));
    }
}
