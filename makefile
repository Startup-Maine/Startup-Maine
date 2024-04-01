zip:
	zip -r startup-maine.zip . -x "node_modules/*" -x ".git/*" -x "*.zip"
.PHONY: zip
clean:
	rm -f startup-maine.zip
.PHONY: clean
