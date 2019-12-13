# MdWordCount

> This package is a port in PHP of [Markdown Word Count](https://github.com/gandreadis/markdown-word-count) for Python3.
> Regular expressions comme from there (except for images) and tests too.

This package helps you count words in a markdown document.
It excludes punctuation, footnotes, and special Markdown or HTML tag syntax.

You may use it, for example, to get an estimation of the reading time of an article written in markdown.

The package provides a class with static methods, function helpers and an executable file.

## Installation

Install with Composer:

```
composer require arcesilas/md-word-count
```

## Usage

### Pass a string:

```php
use Arcesilas\MdWordCount;

$count = MdWordCount::fromString($markdown);
```

### Pass a file path:

```php
use Arcesilas\MdWordCount;

$count = MdWordCount::fromFile($file);

if (false === $count) {
    // File not found or directory
}
```

### Use the helpers:

```php
$count = md_word_count($markdown);
```

```php
$count = md_file_word_count($file);

if (false === $count) {
    // File not found or directory
}
```

### Use the executable:

```shell
bin/mdwc path/to/document.md
```

The executable echoes the word count from given file and exits with code 0.

If the file does not exists, it exits with code 1.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

Run:

```shell
$ composer test
$ composer check-style
```

## Contributing

See [CONTRIBUTING](CONTRIBUTING.md)

## TODO

- Improve the executable with features:
    - accept arguments (see `man wc` for examples)
    - read files from list (or from stdin)
    - read content from stdin

Without using symfony/console for such a small command.
