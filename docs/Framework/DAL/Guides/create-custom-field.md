# Creating a custom field type

If your requirements cannot be covered by the [existing field types](../Reference/fields-reference.md), you can simply create a new field type that better suits your needs.

## Prerequisites
...

## Creating the field

In this example we're going to create a new field type that is storing a valid URL.

### The field type class

First, we are creating a new class `ExampleUrlField` extending from the abstract `Ant\Core\Framework\DAL\Field` class.

To follow the best practices, store this class in your plugin in the directory `<plugin root>/src/DAL/Field`.

```php
// <plugin root>/src/DAL/Field/ExampleUrlField.php
<?php declare(strict_types=1);

namespace PluginNameSpace\DAL\Field;

use Ant\Core\Framework\DAL\Field;

class ExampleUrlField extends Field
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

Let's fill the new field type with content. First we determine which flags can be used for the new field. For simplicity, let's first assume that the field can be a required field. In addition, our field type gets its own `ExampleUrlFieldSerializer` serializer, which must be passed for further processing of the field.

```php
// <plugin root>/src/DAL/Field/ExampleUrlField.php

// ...
use Ant\Core\Framework\DAL\Field\Flag\Required;
use PluginNameSpace\DAL\Field\Serializer\ExampleUrlFieldSerializer;

class ExampleUrlField extends Field
{
    // ...

    public function getAllowedFlags(): ?array
    {
        return [
            Required::class,        
        ];   
    }

    public function getFieldSerializer(): ?string
    {
        return ExampleUrlFieldSerializer::class;
    }
}
```

### The field serializer



### Extending field options

To make the validation of the content more accurate, additional options can be passed to field types. Let's assume we want to make sure the provided URL is of a specific schema, e.g. **http** and **https**.

```php
// <plugin root>/src/DAL/Field/ExampleUrlField.php

// ...

class ExampleUrlField extends Field
{
    private ?array $schema;

    public function __construct(string $storageName, string $propertyName, ?array $schema = null)
    {
        $this->schema = $schema;

        parent::__construct($storageName, $propertyName);
    }
    
    public function getSchema(): ?array
    {
        return $this->schema;
    }

    // ...
}
```