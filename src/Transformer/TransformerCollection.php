<?php

namespace App\Transformer;

class TransformerCollection
{
    /**
     * @var TransformerInterface
     */
    private $transformers;

    public function __construct(iterable $transformers)
    {
        $this->transformers = $transformers;
    }

    public function fromArray($platform, $data)
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($platform)) {
                return $transformer->fromArray($data);
            }
        }
    }
}
