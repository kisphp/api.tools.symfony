<?php

namespace ApiBundle\Tools;

use GuzzleHttp\Client;

class DownloadManager
{
    /**
     * @return string
     */
    protected function getFilePath()
    {
        $dirPath = $this->getRootDirectory() . '/var/';
        $filename = '/download-queue.txt';

        $fullPath = $dirPath . $filename;

        if (is_file($fullPath) === false) {
            touch($fullPath);
        }

        return $fullPath;
    }

    /**
     * @return string
     */
    protected function getRootDirectory()
    {
        return realpath(__DIR__ . '/../../../');
    }

    /**
     * @return string
     */
    protected function getTargetDirectory()
    {
        return $this->getRootDirectory() . '/downloads/';
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    public function saveUrlToFile($url)
    {
        $isSuccess = file_put_contents(
            $this->getFilePath(),
            $url . "\n",
            FILE_APPEND | LOCK_EX
        );

        return (bool) $isSuccess;
    }

    /**
     * @return bool
     */
    public function downloadFirstFile()
    {
        $url = $this->readOneLine();
        if (empty($url)) {
            return false;
        }

        return $this->downloadFile($url);
    }

    /**
     * @return string
     */
    public function readOneLine()
    {
        $fileContent = file_get_contents($this->getFilePath());
        $lines = explode("\n", $fileContent);
        $firstLine = $lines[0];
        unset($lines[0]);
        $this->rewriteFile(implode("\n", array_filter($lines)));

        return $firstLine;
    }

    /**
     * @param $content
     *
     * @return bool
     */
    protected function rewriteFile($content)
    {
        $isSuccess = file_put_contents(
          $this->getFilePath(),
          $content . "\n"
      );

        return (bool) $isSuccess;
    }

  /**
   * @param string $fileName
   * @param string $content
   *
   * @return bool
   */
    protected function saveDownloadedFile($fileName, $content)
    {
        $isSuccess = file_put_contents(
          $fileName,
          $content . "\n"
      );

        return (bool) $isSuccess;
    }

    /**
     * @param string$fileUrl
     *
     * @return bool
     */
    public function downloadFile($fileUrl)
    {
        $targetFileName = $this->makeTargetFileName($fileUrl);

        if ($this->fileIsNotAllowed($fileUrl)) {
            throw new \LogicException('File type is not allowed');
        }

        $client = new Client();
        $response = $client->get($fileUrl)
            ->getBody()
            ->getContents()
        ;

        return $this->saveDownloadedFile($targetFileName, $response);
    }

    /**
     * @param string $fileUrl
     *
     * @return string
     */
    public function makeTargetFileName($fileUrl)
    {
        $baseName = basename($fileUrl);
        $targetFilePath = sprintf('%s%s', $this->getTargetDirectory() . $baseName, '%s');

        $originalFile = sprintf($targetFilePath, '');
        if (is_file($originalFile) === false) {
            return $originalFile;
        }

        $i = 1;
        do {
            $tmp = sprintf($targetFilePath, '_' . $i);
            $i++;
        } while (is_file($tmp));

        return $tmp;
    }

    /**
     * @param string $fileUrl
     *
     * @return bool
     */
    protected function fileIsNotAllowed($fileUrl)
    {
        return preg_match('/(\.pdf)$/', $fileUrl) === false;
    }
}
