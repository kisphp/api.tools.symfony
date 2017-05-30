<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class DownloadTransformer implements TransformerInterface
{
    /**
   * @param DecoderInterface $decoder
   *
   * @return string
   */
  public function transform(DecoderInterface $decoder)
  {
      $dirPath = realpath(__DIR__ . '/../../../var/');
      $filename = '/download-queue.txt';

      if (is_file($dirPath . $filename) === false) {
          touch($dirPath . $filename);
      }

      file_put_contents($dirPath . $filename, $decoder->getData() . "\n", FILE_APPEND | LOCK_EX);

      return sprintf('Url: %s was successfully saved', $decoder->getData());
  }
}
