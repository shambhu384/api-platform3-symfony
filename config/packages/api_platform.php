<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Webmozart\Assert\InvalidArgumentException;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('api_platform', [
        'metadata_backward_compatibility_layer' => false,
        'mapping' => [
            'paths' => [
                '%kernel.project_dir%/src/Entity/',
            ],
        ],
        'patch_formats' => [
            'json' => ['application/merge-patch+json'],
        ],
        'swagger' => [
		'versions' => [3],
         	'api_keys' => [
             		'apiKey' => [
                		'name' => 'Authorization',
				'type' => 'header'
	     		]
		]
        ],
        'exception_to_status' => [
            InvalidArgumentException::class => 422,
	]
    ]);
};

