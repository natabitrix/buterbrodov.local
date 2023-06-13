<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '90f3213cfaa40ac3208ac9415f213754966b9790',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '90f3213cfaa40ac3208ac9415f213754966b9790',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'kint-php/kint' => array(
            'pretty_version' => '5.0.1',
            'version' => '5.0.1.0',
            'reference' => 'dd7fbd9673a88f6c5d2f838aacb2340afa4ce044',
            'type' => 'library',
            'install_path' => __DIR__ . '/../kint-php/kint',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => true,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'roave/security-advisories' => array(
            'pretty_version' => 'dev-latest',
            'version' => 'dev-latest',
            'reference' => '22b763b5abdc69572b66c462cd85c2b2135f56aa',
            'type' => 'metapackage',
            'install_path' => NULL,
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
        'symfony/console' => array(
            'pretty_version' => 'v4.1.12',
            'version' => '4.1.12.0',
            'reference' => '9e87c798f67dc9fceeb4f3d57847b52d945d1a02',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/console',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '8ad114f6b39e2c98a8b0e3bd907732c207c2b534',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'wikimedia/composer-merge-plugin' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'ab7cf5e140e23ce603872780ab8b570cfaf9c1f9',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../wikimedia/composer-merge-plugin',
            'aliases' => array(
                0 => '2.x-dev',
            ),
            'dev_requirement' => false,
        ),
    ),
);