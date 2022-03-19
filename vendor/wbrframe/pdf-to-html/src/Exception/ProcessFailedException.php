<?php

declare(strict_types=1);

namespace Wbrframe\PdfToHtml\Exception;

use Symfony\Component\Process\Exception\ProcessFailedException as BaseProcessFailedException;

/**
 * ProcessFailedException.
 */
class ProcessFailedException extends BaseProcessFailedException
{
}
