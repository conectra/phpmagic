<?php

namespace Solis\PhpMagic\Sample\Pessoas;

use Solis\PhpMagic\Helpers\Magic;
use Solis\PhpMagic\Helpers\Types;

/**
 * Class Cidade
 *
 * @package Sample\Pessoas
 */
class Cidade
{
    use Magic;

    /**
     * @var array
     */
    protected $schema = [
        [
            'name'     => 'sNome',
            'type'     => Types::TYPE_STRING,
            'property' => 'nome'
        ],
        [
            'name'     => 'iCodigoIbge',
            'type'     => Types::TYPE_INT,
            'property' => 'codigoIbge'
        ],
        [
            'name'     => 'aEstado',
            'property' => 'estado',
            'class'    => [
                'class' => 'Solis\\PhpMagic\\Sample\\Pessoas\\Estado',
                'name'  => [
                    'sNome',
                    'iCodigoIbge',
                ]
            ]
        ],
    ];

    /**
     * @var string
     */
    protected $nome;

    /**
     * @var string
     */
    protected $codigoIbge;

    /**
     * @var string
     */
    protected $estado;

}