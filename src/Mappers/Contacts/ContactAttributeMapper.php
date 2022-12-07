<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Models\Contacts\ContactAttribute;
use stdClass;

class ContactAttributeMapper
{
    /**
     * @param stdClass $data
     * @return ContactAttribute
     */
    public function map(stdClass $data): ContactAttribute
    {
        $attribute = null;

        if (property_exists($data, 'attribute')) {

            $attributeMapper = new OptionMapper();
            $attribute = $attributeMapper->map($data->attribute);

        }

        return new ContactAttribute($data, $attribute ?? []);
    }
}
