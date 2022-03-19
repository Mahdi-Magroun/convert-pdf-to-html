<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Converter;

use Wbrframe\PdfToHtml\File\Html;

/**
 * ConverterInterface.
 */
interface ConverterInterface
{
    /**
     * @return Html
     */
    public function createHtml(): Html;
}
