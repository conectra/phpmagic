<?php

namespace Solis\PhpMagic\Classes\Schema;

use Solis\Breaker\TException;
use Solis\PhpMagic\Abstractions\Schema\SchemaEntryAbstract;

/**
 * Class SchemaEntry
 *
 * @package Solis\PhpMagic\Classes
 */
class SchemaEntry extends SchemaEntryAbstract
{
    /**
     * make
     *
     * @param $schema
     *
     * @return SchemaEntry
     * @throws TException
     */
    public static function make($schema)
    {
        if (!array_key_exists(
            'property',
            $schema
        )
        ) {
            throw new TException(
                __CLASS__,
                __METHOD__,
                'not found property key in schema',
                400
            );
        }

        if (!array_key_exists(
            'name',
            $schema
        )
        ) {
            throw new TException(
                __CLASS__,
                __METHOD__,
                'not found name key in schema',
                400
            );
        }

        $instance = new self(
            $schema['name'],
            $schema['property'],
            !array_key_exists(
                'type',
                $schema
            ) ? null : $schema['type']
        );

        if (array_key_exists(
            'format',
            $schema
        )) {
            $format = [];
            foreach ($schema['format'] as $item) {
                $format[] = FormatEntry::make($item);
            }
            $instance->setFormat($format);
        }

        if (array_key_exists(
            'object',
            $schema
        )) {
            $instance->setObject(ObjectEntry::make($schema['object']));
        }

        return $instance;
    }
}
