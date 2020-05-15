<?php
return [
     'file_extension' => [
        [
            'name' => 'Documentos excel',
            'extension' => [
                'xls',
                'xlm',
                'xla',
                'xlc',
                'xlt',
                'xlw',
                'xlam',
            ]
        ],
        [
            'name' => 'Documentos pdf',
            'extension' => [
                'pdf'
            ]
        ],
    ],
    'invoice_type' => [
        [
            'name' => 'Factura',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Nota de credito',
            'type' => 'egreso',
        ],
        [
            'name' => 'Nota de debito',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Honorarios',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Arrendamiento',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Cotización',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Remisión',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Recibo de nomina',
            'type' => 'nomina',
        ],
        [
            'name' => 'Recibo de donación',
            'type' => 'ingreso',
        ],
        [
            'name' => 'Complemento para pagos',
            'type' => 'pago',
        ],

    ]
];
