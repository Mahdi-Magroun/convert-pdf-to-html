<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Converter\PopplerUtils;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use Wbrframe\PdfToHtml\Exception\ProcessFailedException;
use Wbrframe\PdfToHtml\Exception\RuntimeException;
use Wbrframe\PdfToHtml\File\Html;

/**
 * Command.
 */
class PdfToHtmlCommand
{
    /**
     * @var string
     */
    private $inputFilePath;

    /**
     * @var PdfToHtmlOptions
     */
    private $options;

    /**
     * @param string           $inputFilePath
     * @param PdfToHtmlOptions $options
     */
    public function __construct(string $inputFilePath, PdfToHtmlOptions $options)
    {
        $this->inputFilePath = $inputFilePath;
        $this->options = $options;
    }

    /**
     * @throws ProcessFailedException
     * @throws RuntimeException
     *
     * @return Html
     */
    public function execute(): Html
    {
        $process = new Process($this->prepareCommand());
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $fs = new Filesystem();
        

        return new Html($this->options->getOutputFilePath());
    }

    /**
     * @return string[]
     */
    private function prepareCommand(): array
    {
        $command[] = $this->options->getBinPath();
        $command[] = $this->inputFilePath;
        $command[] = '-s'; // single file
        $command[] = '-i'; // without images
        $command[] = '-noframes'; // without iframe
        $command = array_merge($command, $this->prepareFlags());
        $command[] = $this->options->getOutputFilePath();

        return $command;
    }

    /**
     * @return string[]
     */
    private function prepareFlags(): array
    {
        $flags = [];

        if ($this->options->isComplexDocumentEnabled()) {
            $flags[] = '-c';
        }

        if ($this->options->isNoMergeEnabled()) {
            $flags[] = '-nomerge';
        }

        return $flags;
    }
}
