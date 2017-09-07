<?php

namespace Rewake\Traits;


trait PopulatePropertiesTrait
{
    public function populateProperties($data)
    {
        // Make sure we have data to process
        if (empty($data)) {

            return;
        }

        // Get class properties
        $properties = (new \ReflectionClass($this))->getProperties();

        // Create ArrayObject from $data
        $dao = new \ArrayObject($data, \ArrayObject::ARRAY_AS_PROPS);

        // Loop properties
        foreach ($properties as $property) {

            // Assign property value if set
            if (isset($dao->{$property->name})) {

                $this->{$property->name} = $dao->{$property->name};
            }
        }

        // Cleanup
        unset(
            $properties,
            $dao
        );
    }
}