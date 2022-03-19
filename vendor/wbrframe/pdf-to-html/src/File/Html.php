<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\File;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Html.
 */
class Html
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @return Crawler
     */
    public function createCrawler(): Crawler
    {
        return new Crawler($this->filePath);
    }
}
