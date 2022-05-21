include .env

help: ## Show this help.
	@echo "$$(fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep \
	| sed -E 's/\\$$//;s/[#]{3} (.*$$)/\n\n\1\:\n/;s/(.*):.*#''# (.*)/\1:\2/g' \
	| awk -F':' '{ printf(($$1""$$2 != "" ? "$(BOLD)%-20s\1$(/BOLD)%s\n" :"\n"), $$1, $$2); }' $(Style))"

build: ## build without detach a laravel container
	docker-compose up -d --build

build-d: ## build with detach a laravel container
	docker-compose up --build

start: ## Start a laravel container
	docker-compose up -d

stop: ## Stop a laravel container
	docker-compose down

restart: ## Restart a laravel container
	docker restart php-${APP_ENV} && docker restart nginx-${APP_ENV}

container: ## Enter on a laravel container
	docker exec -it php-${APP_ENV} bash
