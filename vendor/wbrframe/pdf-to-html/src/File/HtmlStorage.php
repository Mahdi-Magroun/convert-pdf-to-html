<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\File;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Wbrframe\PdfToHtml\Exception\RuntimeException;

/**
 * HtmlStorage.
 */
class HtmlStorage
{
    /**
     * @param string|null $outputFolder
     *
     * @return string
     */
    public function prepareOutputFilePath(string $outputFolder = null): string
    {
        $outputFolder = $outputFolder ?? $this->createOutputFolder();

        return sprintf('%s/%s.html', $outputFolder, uniqid('', true));
    }

    /**
     * @return string
     *
     * @throws RuntimeException
     */
    public function createOutputFolder(): string
    {
        $fs = new Filesystem();

        $outputFolder = sprintf('%s/output', sys_get_temp_dir());
        try {
            $fs->mkdir($outputFolder);
        } catch (IOException $exception) {
            throw new RuntimeException(sprintf('Directory %s failed to create', $outputFolder));
        }

        return $outputFolder;
    }
}
