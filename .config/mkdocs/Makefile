help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo "  help                           to show this help"
	@echo "  docs                           to make the documentation"
	@echo "  serve                          to run the mkdocs server"
	@echo "  link                           to create symbolic links in docs"
	@echo "  copy                           to copy files to docs"
	@echo "  clean                          to clean intermediate build files in docs"
	@echo "  version                        to display version information"

LC_ALL=C

DOCS=docs/
SRC=../../
VCS=git
IGNORE=.$(VCS)ignore

PMD=README.md UPGRADING.md composer.json doc
SRCS=$(patsubst %,$(SRC)%,$(PMD))
TRGS=$(patsubst %,$(DOCS)%,$(PMD))

.PHONY: docs clean serve
docs  : $(TRGS) ; mkdocs build --strict
serve : $(TRGS) ; mkdocs serve
clean :         ; $(VCS) clean -fx $(DOCS) && make -s $(DOCS)$(IGNORE)

.PHONY: version
version:
	@mkdocs --version
	@mike --version
	@pip freeze | grep mkdocs-material | tr '\n' ' '; printf '\n'


vcs_ignore=((test -f $(DOCS)$(IGNORE) && grep -qxF '/$1' $(DOCS)$(IGNORE)) || printf '/$1\n' >> $(DOCS)$(IGNORE)) && LC_ALL=C sort -s -o $(DOCS)$(IGNORE) $(DOCS)$(IGNORE)

.PHONY: link copy
link: $(TRGS)
copy:| $(DOCS)$(IGNORE) $(SRCS)
	cp -r -t $(DOCS) $(patsubst %,$(SRC)%,$(PMD))
	$(foreach entry,$(PMD),$(call vcs_ignore,$(entry));)

$(TRGS):| $(DOCS)$(IGNORE) $(SRCS)
	ln -sfT $(abspath $(SRC))/$(@F) $(abspath $@)
	$(call vcs_ignore,$(@F))
	touch -h $@

$(DOCS)$(IGNORE):
	$(call vcs_ignore,$(IGNORE))
	touch $@
