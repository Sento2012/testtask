<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=172.18.18.4;dbname=devdb',
    'username' => 'devuser',
    'password' => 'devsecret',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
