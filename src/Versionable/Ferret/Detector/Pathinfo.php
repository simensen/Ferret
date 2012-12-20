<?php

namespace Versionable\Ferret\Detector;

use Versionable\Ferret\Detector\DetectorInterface;
use Versionable\Ferret\Metadata\Metadata;

class Pathinfo extends DetectorAbstract
{

  protected $mapping = array(

            'txt'   => 'text/plain',
            'htm'   => 'text/html',
            'html'  => 'text/html',
            'php'   => 'text/html',
            'css'   => 'text/css',
            'js'    => 'application/javascript',
            'json'  => 'application/json',
            'xml'   => 'application/xml',
            'swf'   => 'application/x-shockwave-flash',
            'flv'   => 'video/x-flv',
            'csv'   => 'text/csv',

            // images
            'png'   => 'image/png',
            'jpe'   => 'image/jpeg',
            'jpeg'  => 'image/jpeg',
            'jpg'   => 'image/jpeg',
            'gif'   => 'image/gif',
            'bmp'   => 'image/bmp',
            'ico'   => 'image/vnd.microsoft.icon',
            'tiff'  => 'image/tiff',
            'tif'   => 'image/tiff',
            'svg'   => 'image/svg+xml',
            'svgz'  => 'image/svg+xml',

            // archives
            'zip'   => 'application/zip',
            'rar'   => 'application/x-rar-compressed',
            'exe'   => 'application/x-msdownload',
            'msi'   => 'application/x-msdownload',
            'cab'   => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3'   => 'audio/mpeg',
            'qt'    => 'video/quicktime',
            'mov'   => 'video/quicktime',

            // adobe
            'pdf'   => 'application/pdf',
            'psd'   => 'image/vnd.adobe.photoshop',
            'ai'    => 'application/postscript',
            'eps'   => 'application/postscript',
            'ps'    => 'application/postscript',

            // ms office
            'doc'   => 'application/msword',
            'rtf'   => 'application/rtf',
            'xls'   => 'application/vnd.ms-excel',
            'ppt'   => 'application/vnd.ms-powerpoint',

            // open office
            'odt'   => 'application/vnd.oasis.opendocument.text',
            'ods'   => 'application/vnd.oasis.opendocument.spreadsheet',
  );


  public function setMapping($mapping)
  {
    if (\is_array($mapping) && !empty($mapping))
    {
      $this->mapping = $mapping;

      return true;
    }

    return false;
  }

  public function getMapping()
  {
    return $this->mapping;
  }

  public function detect($input = null, Metadata $metadata = null)
  {
    if (null === $metadata) {
      return false;
    }

    $filepath = $metadata->get(Metadata::RESOURCE_NAME_KEY);

    if (null === $filepath)
    {
      return false;
    }

    $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

    if (array_key_exists($ext, $this->mapping))
    {
      return $this->mapping[$ext];
    }

    return false;
  }
}
