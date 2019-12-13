<?php

namespace Arcesilas\MdWordCount\Tests;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    /** @dataProvider Arcesilas\MdWordCount\Tests\MdWordCountTest::markdownProvider */
    public function testStringHelper(string $file, int $count)
    {
        $file = __DIR__ . "/markdown/{$file}";
        $this->assertSame($count, md_word_count(file_get_contents($file)));
    }

    /** @dataProvider Arcesilas\MdWordCount\Tests\MdWordCountTest::markdownProvider */
    public function testFileHelper(string $file, int $count)
    {
        $file = __DIR__ . "/markdown/{$file}";
        $this->assertSame($count, md_file_word_count($file));
    }

    public function testFileHelperReturnsFalse()
    {
        $this->assertFalse(md_file_word_count('foo.md'));
    }
}
