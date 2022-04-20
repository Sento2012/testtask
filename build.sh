#!/bin/bash
docker-compose build
docker-compose exec php composer install
docker-compose exec php php yii migrate/up --interactive = 0
docker-compose exec php php yii data/import
docker-compose up