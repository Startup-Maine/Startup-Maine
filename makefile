node_modules: package.json yarn.lock
	yarn install

build:
	yarn exec mix
.PHONY: build

zip:
	zip -r startup-maine.zip . -x "node_modules/*" -x ".git/*" -x "*.zip"
.PHONY: zip

clean:
	rm -f startup-maine.zip
.PHONY: clean
