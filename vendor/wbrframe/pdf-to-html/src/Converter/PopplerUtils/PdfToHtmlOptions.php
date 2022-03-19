<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Converter\PopplerUtils;

use Wbrframe\PdfToHtml\File\HtmlStorage;

/**
 * PdfToHtmlOptions.
 */
class PdfToHtmlOptions
{
    const DEFAULT_BIN_PATH = '/usr/bin/pdftohtml';

    /**
     * @var string
     */
    private $binPath;

    /**
     * @var string|null
     */
    private $outputFolder;

    /**
     * @var string|null
     */
    private $outputFilePath;

    /**
     * @var bool
     */
    private $complexDocument;

    /**
     * @var bool
     */
    private $noMerge;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->binPath = self::DEFAULT_BIN_PATH;
        $this->complexDocument = false;
        $this->noMerge = false;
    }

    /**
     * @return string
     */
    public function getBinPath(): string
    {
        return $this->binPath;
    }

    /**
     * @param string $binPath
     *
     * @return $this
     */
    public function setBinPath(string $binPath): self
    {
        $this->binPath = $binPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOutputFolder()
    {
        return $this->outputFolder;
    }

    /**
     * @param string $outputFolder
     *
     * @return $this
     */
    public function setOutputFolder($outputFolder): self
    {
        $this->outputFolder = $outputFolder;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutputFilePath(): string
    {
        if (null === $this->outputFilePath) {
            $storage = new HtmlStorage();

            $this->outputFilePath = $storage->prepareOutputFilePath($this->outputFolder);
        }

        return $this->outputFilePath;
    }

    /**
     * @param string $outputFilePath
     *
     * @return $this
     */
    public function setOutputFilePath($outputFilePath): self
    {
        $this->outputFilePath = $outputFilePath;

        return $this;
    }

    /**
     * @return $this
     */
    public function complexDocument(): self
    {
        $this->complexDocument = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isComplexDocumentEnabled(): bool
    {
        return $this->complexDocument;
    }

    /**
     * @return $this
     */
    public function noMerge(): self
    {
        $this->noMerge = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNoMergeEnabled(): bool
    {
        return $this->noMerge;
    }
}
