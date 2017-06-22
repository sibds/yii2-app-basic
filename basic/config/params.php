<?php

return [
    'adminEmail' => 'admin@example.com',
    "yii.migrations"=> [ // Сюда добавляем миграции для простой миграции
        "@vendor/dektrium/yii2-user/migrations",
        "@yii/rbac/migrations",
    ],
];