# Creating custom fields

If your requirements cannot be covered by the [existing field types](../Reference/field-reference.md), you can simply create a new field type that better suits your needs.

## Prerequisites
...

## Creating the field

In this example we're going to create a new field type that is storing a valid URL.

### The field type class

First, we are creating a new class `ExampleField` extending from the abstract `Ant\Core\Framework\DAL\Field` class.

To follow the best practices, store this class in your plugin in the directory `<plugin root>/src/DAL/Field`.

```php
<?php declare(strict_types=1);

namespace PluginNameSpace\DAL\Field;

use Ant\Core\Framework\DAL\Field;

class ExampleField extends Field
{
    public function getAllowedFlags(): ?array
    {
        // TODO: Implement getAllowedFlags() method.
    }

    public function getFieldSerializer(): ?string
    {
        // TODO: Implement getFieldSerializer() method.
    }
}
```

As you can see, there are two methods that need to be provided by this class. The `getAllowedFlags` method returns an array of flags which are allowed to be set to this field in your entity definition.

The `getFieldSerializer` method returns the FQCN of the serializer for this field type. You can either use a predefined serializer (which doesn't make much sense) or [create your own](#the-field-serializer).

### The field serializer