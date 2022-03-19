<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Converter;

use Wbrframe\PdfToHtml\Converter\PopplerUtils\PdfToHtmlConverter;
use Wbrframe\PdfToHtml\Converter\PopplerUtils\PdfToHtmlOptions;
use Wbrframe\PdfToHtml\Exception\RuntimeException;

/**
 * ConverterFactory.
 */
class ConverterFactory
{
    /**
     * @var string
     */
    private $inputFilePath;

    /**
     * @param string $inputFilePath
     */
    public function __construct(string $inputFilePath)
    {
        $this->inputFilePath = $inputFilePath;
    }

    /**
     * @param PdfToHtmlOptions|null $options
     *
     * @return PdfToHtmlConverter
     *
     * @throws RuntimeException
     */
    public function createPdfToHtml(PdfToHtmlOptions $options = null): PdfToHtmlConverter
    {
        $options = $options ?? new PdfToHtmlOptions();

        if (!is_executable($options->getBinPath())) {
            throw new RuntimeException('Before use the library, install poppler-utils');
        }

        return new PdfToHtmlConverter($this->inputFilePath, $options);
    }
}
