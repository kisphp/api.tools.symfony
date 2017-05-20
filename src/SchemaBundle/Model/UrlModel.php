<?php

namespace SchemaBundle\Model;

use SchemaBundle\Entity\DownloadUrlEntity;

class UrlModel extends AbstractModel
{
    const STATUS_NEW = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_FINISHED = 3;

    /**
     * @param string $url
     */
    public function saveUrl($url)
    {
        $this->db->insert(DownloadUrlEntity::TABLE, [
            'url' => $url,
        ]);
    }

    public function getUrlToProcess()
    {
        $sql = sprintf("SELECT * FROM %s WHERE status = %d ORDER BY id ASC LIMIT 1", DownloadUrlEntity::TABLE, self::STATUS_NEW);

        $row = $this->db->getRow($sql);

        $this->db->update(DownloadUrlEntity::TABLE, [
            'status' => self::STATUS_PROCESSING,
        ], $row['id']);

        return $row;
    }
}
