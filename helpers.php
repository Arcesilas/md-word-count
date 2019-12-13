<?php

function md_word_count(string $markdown): int
{
    return Arcesilas\MdWordCount\MdWordCount::fromString($markdown);
}

function md_file_word_count(?string $file)
{
    return Arcesilas\MdWordCount\MdWordCount::fromFile($file);
}
