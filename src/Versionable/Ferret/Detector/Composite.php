<?php

namespace Versionable\Ferret\Detector;

use Versionable\Ferret\Detector\DetectorInterface;
use Versionable\Ferret\Detector\Exception\DetectorException;
use Versionable\Ferret\Metadata\Metadata;

class Composite extends DetectorAbstract
{
  protected $detectors = array();

  public function addDetector(DetectorInterface $detector)
  {
    $this->detectors[] = $detector;
  }

  public function detect($input = null, Metadata $metadata = null)
  {
    foreach($this->detectors as $detector)
    {
      $type = $detector->detect($input, $metadata);
      if ($type !== false)
      {
        return $type;
      }
    }

    return false;
  }
}
