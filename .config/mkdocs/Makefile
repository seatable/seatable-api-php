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


vcs_ignore=((test -f $(DOCS)$(IGNORE) && grep -qxF '/$1' $(DOCS)$(IGNORE)) || printf '/$1\n' >> $(DOCS)$(IGNORE)) && LC_ALL=C sort -s -o $(DOCS)$(IGNORE) $(DOCS)$(IGNORE)

$(TRGS):| $(DOCS)$(IGNORE) $(SRCS)
	ln -sfT $(abspath $(SRC))/$(@F) $(abspath $@)
	$(call vcs_ignore,$(@F))
	touch -h $@

$(DOCS)$(IGNORE):
	$(call vcs_ignore,$(IGNORE))
	touch $@