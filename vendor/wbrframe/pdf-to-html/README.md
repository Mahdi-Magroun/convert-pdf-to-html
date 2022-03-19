# PDF to HTML PHP Class (only for Linux)

PDF to HTML converter with PHP using tools, like poppler-utils.
Currently only supported poppler-utils.

# Important 

PdfToHtml from package poppler-utils always executing with next flags:
* `-s` # single file
* `-i` # without images
* `-noframes` # without iframe

## Installation

When you are in your active directory apps, you can just run this command to add this package on your app

```
composer req wbrframe/pdf-to-html
```

## Requirements
1. Poppler-Utils (if you are using Ubuntu Distro, just install it from apt )

`sudo apt-get install poppler-utils`

## Usage

In this example HTML file will be created in system temporary folder with in subfolder `output` a random name.
Example: `/tmp/output/5e8671ec8e0283.34152860.html`

```php
<?php

use Wbrframe\PdfToHtml\Converter\ConverterFactory;

// if you are using composer, just use this
include 'vendor/autoload.php';

// initiate
$converterFactory = new ConverterFactory('test.pdf');
$converter = $converterFactory->createPdfToHtml();

$html = $converter->createHtml();

// Get absolute path created HTML file
$htmlFilePath = $html->getFilePath();

// or get Crawler (symfony/dom-crawler)
$crawler = $html->createCrawler();
 
?>
```

You can change some options like is `outputFolder`, `outputFilePath` and `binPath`, where an option `outputFolder` is folder were HTML will be created,
 `outputFilePath` is absolute path for HTML file that you want to create, `binPath` is path to `pdftohtml`

NOTE: If `outputFilePath` is specified, option an `outputFolder` is was be missed.

```php
<?php

use Wbrframe\PdfToHtml\Converter\ConverterFactory;
use Wbrframe\PdfToHtml\Converter\PopplerUtils\PdfToHtmlOptions;

// if you are using composer, just use this
include 'vendor/autoload.php';

$converterFactory = new ConverterFactory('test.pdf');

$options = (new PdfToHtmlOptions())
    ->setBinPath('/path/pdftohtml')
    ->setOutputFolder('/app/output')
    ->setOutputFilePath('/app/output/file.html')
;

$converter = $converterFactory->createPdfToHtml($options);

$html = $converter->createHtml();
?>
```
