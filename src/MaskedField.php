<?php

namespace Greg0x46\MaskedField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\SupportsDependentFields;

class MaskedField extends Field
{
    use SupportsDependentFields;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'masked-field';

    /**
     * Define field mask
     *
     * @param string $mask
     * @return $this
     */
    public function maskOptions(array $maskOptions = [])
    {
        return $this->withMeta(['maskOptions' => $maskOptions]);
    }

    public function mask(string $mask = '')
    {
        return $this->maskOptions(['mask' => $mask]);
    }
}
