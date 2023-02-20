# Int Field

A field that stores an **int** value.

| Reference     | Description                                                                                                                       |
|:--------------|-----------------------------------------------------------------------------------------------------------------------------------|
| Class         | [IntField](https://github.com/metallike/ant/blob/master/src/Core/Framework/DAL/Field/IntField.php)                                |
| Serializer    | [IntFieldSerializer](https://github.com/metallike/ant/blob/master/src/Core/Framework/DAL/Field/Serializer/IntFieldSerializer.php) |
| Allowed Flags | [Required](../Flags/required-flag.md), [PrimaryKey](../Flags/primary-key-flag.md)                                                 |

## Description

```php
new IntField(string $storageName, string $propertyName, ?int $minValue = null, ?int $maxValue = null)
```

## Parameters

### `storageName`

**type**: `string`

Defines the name of the corresponding column in the database. Make sure to use only characters supported by MySQL and no [reserved words or keywords](https://dev.mysql.com/doc/refman/8.0/en/keywords.html) used by MySQL.

### `propertyName`

**type**: `string`

Defines the name of the property of the corresponding entity class. Written in lowerCamelCase.


### `minValue`

**type**: `int`|`null` **default**: `null`

This option can be used to define a minimum value for the int field. If set, the provided value must be *greater than or equal* the provided minimum value. 

### `maxValue`

**type**: `int`|`null` **default**: `null`

This option can be used to define a maximum value for the int field. If set, the provided value must be *less than or equal* the provided maximum value. 