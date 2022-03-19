<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Converter;

use Wbrframe\PdfToHtml\File\Html;

/**
 * AbstractConverter.
 */
abstract class AbstractConverter implements ConverterInterface
{
    /**
     * @var string
     */
    protected $inputFilePath;

    /**
     * @param string $inputFilePath
     */
    public function __construct(string $inputFilePath)
    {
        $this->inputFilePath = $inputFilePath;
    }

    /** {@inheritdoc} */
    abstract public function createHtml(): Html;
}
