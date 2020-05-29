up:
	docker-compose up -d

status:
	docker-compose ps

stop:
	docker-compose stop

reload:
	docker-compose stop && docker-compose up -d

prepare-db:
	docker exec -it playground-app php /commands/prepare.php
