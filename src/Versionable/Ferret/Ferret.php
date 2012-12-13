<?php

namespace Versionable\Ferret;

use Versionable\Ferret\FerretInterface;
use Versionable\Ferret\Detector\DetectorInterface;
use Versionable\Ferret\Metadata\Metadata;

class Ferret implements FerretInterface
{
  protected $detector = null;

  public function getDetector()
  {
    return $this->detector;
  }

  public function setDetector(DetectorInterface $detector)
  {
    $this->detector = $detector;

    return true;
  }

  public function detectFromFilename($filename)
  {
    $metadata = new Metadata;
    $metadata->set(Metadata::RESOURCE_NAME_KEY, $filename);

    return $this->getDetector()->detect(null, $metadata);
  }
}
