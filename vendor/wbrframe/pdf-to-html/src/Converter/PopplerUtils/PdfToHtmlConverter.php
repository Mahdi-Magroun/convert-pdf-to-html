<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Converter\PopplerUtils;

use Wbrframe\PdfToHtml\Converter\AbstractConverter;
use Wbrframe\PdfToHtml\Exception\RuntimeException;
use Wbrframe\PdfToHtml\File\Html;

/**
 * PdfToHtmlConverter.
 */
class PdfToHtmlConverter extends AbstractConverter
{
    /**
     * @var PdfToHtmlOptions
     */
    private $options;

    /**
     * @param string           $inputFilePath
     * @param PdfToHtmlOptions $options
     *
     * @throws RuntimeException
     */
    public function __construct($inputFilePath, PdfToHtmlOptions $options)
    {
        parent::__construct($inputFilePath);
        $this->options = $options;
    }

    /** {@inheritdoc} */
    public function createHtml(): Html
    {
        $command = new PdfToHtmlCommand($this->inputFilePath, $this->options);

        return $command->execute();
    }
}
