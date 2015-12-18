<?php

namespace ApiBundle\Transformer;

use ApiBundle\Manager\ManagerInterface;

class XmlTransformer
{
    /**
     * @param ManagerInterface $manager
     *
     * @return string
     */
    public function transform(ManagerInterface $manager)
    {
        $xml = new \SimpleXMLElement('<xml/>');

        foreach ($manager->getData() as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $items = $xml->addChild('items');
                    $item = $items->addChild('item');
                } else {
                    $item = $xml->addChild($key);
                }
                foreach ($value as $k => $v) {
                    $item->addChild($k, $v);
                }
                continue;
            }
            $xml->addChild($key, $value);
        }

        return $xml->asXML();
    }
}
