<?php

namespace Versionable\Ferret\Detector;

use Versionable\Ferret\Detector\DetectorInterface;
use Versionable\Ferret\Metadata\Metadata;

interface DetectorInterface
{
  /**
   * Detects and returns MIME type for given filepath
   *
   * @param resource|null $input    Stream resource
   * @param Metadata|null $metadata Metadata
   *
   * @return bool|string
   */
  public function detect($input = null, Metadata $metadata = null);

  public function getHash();

  public function equal(DetectorInterface $detector);

}
