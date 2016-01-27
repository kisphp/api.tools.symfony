<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class XmlTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        $xml = new \SimpleXMLElement('<xml/>');

        foreach ($decoder->getData() as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $items = $xml->addChild('items');
                    $item = $items->addChild('item');
                } else {
                    $item = $xml->addChild($key);
                }
                foreach ($value as $k => $v) {
                    if (is_array($v)) {
                        continue;
                    }
                    $item->addChild($k, $v);
                }
                continue;
            }
            $xml->addChild($key, $value);
        }

        return $xml->asXML();
    }
}
