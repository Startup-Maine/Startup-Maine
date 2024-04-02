node_modules: package.json yarn.lock
	yarn install

dev:
	yarn vite dev
.PHONY: dev

build:
	yarn vite build
.PHONY: build

zip:
	zip -r startup-maine.zip . -x "node_modules/*" -x ".git/*" -x "*.zip"
.PHONY: zip

clean:
	rm -f startup-maine.zip
.PHONY: clean
