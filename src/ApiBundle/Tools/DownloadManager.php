<?php

namespace ApiBundle\Tools;

class DownloadManager
{
    /**
     * @return string
     */
    protected function getFilePath()
    {
        $dirPath = realpath(__DIR__ . '/../../../var/');
        $filename = '/download-queue.txt';

        $fullPath = $dirPath . $filename;

        if (is_file($fullPath) === false) {
            touch($fullPath);
        }

        return $fullPath;
    }

  /**
   * @param string $url
   *
   * @return bool
   */
    public function saveUrlToFile($url)
    {
        $isSuccess = file_put_contents($this->getFilePath(), $url . "\n", FILE_APPEND | LOCK_EX);

        return (bool) $isSuccess;
    }
}
