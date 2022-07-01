const DEFAULT_OPTIONS = {
    classNames: {
        wrapperEl: 'custom-select',
        selectEl: 'custom-select__select',
        renderedEl: 'custom-select__rendered focus:outline-none focus:ring-1 focus:ring-blue-500',
        renderedTextEl: 'custom-select__rendered-text',
        searchEl: 'custom-select__search py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500',
        optionsEl: 'custom-select__options',
        optionEl: 'custom-select__option focus:outline-none focus:text-white focus:bg-blue-300',
        init: 'js-init-custom-select',
        open: 'is-open',
        onTop: 'is-on-top',
        selected: 'is-selected',
        hidden: 'is-hidden',
    },
    minimumOptionsForSearch: 10,
    onOpen: null,
    onClose: null,
    onToggle: null,
}

class CustomSelect {
    // Elements
    wrapperEl
    renderedEl
    renderedTextEl
    searchEl
    optionsEl
    optionEls
    // Functions
    handleSearch
    optionElClick
    clickOutside
    escPress

    constructor(selectEl, options = {}) {
        // Handle arguments
        this.selectEl = selectEl
        this.options = deepMerge(DEFAULT_OPTIONS, options)
            // Bind 'this'
        this.open = this.open.bind(this)
        this.close = this.close.bind(this)
        this.toggle = this.toggle.bind(this)
        this.handleSearch = this.handleSearchFn.bind(this)
        this.optionElClick = this.optionElClickFn.bind(this)
        this.clickOutside = this.clickOutsideFn.bind(this)
        this.escPress = this.escPressFn.bind(this)
            // Functions
        this.init()
    }

    init() {
        // Check if already init
        if (this.selectEl.classList.contains(this.options.classNames.init)) {
            console.error(`CSelect already initialized. ID: ${this.selectEl.id}`)
            return
        }
        // Handle select element
        this.selectEl.setAttribute('tabindex', '-1')
        this.selectEl.classList.add(this.options.classNames.selectEl)
            // Functions
        this.generateHTML()
        this.addEvents()
            // Add initialization
        this.selectEl.classList.add(this.options.classNames.init)
    }


    generateHTML() {
        // Generate wrapper
        const wrapperHTML = /* HTML */ `<div class="${this.options.classNames.wrapperEl}"></div>`
        this.selectEl.insertAdjacentHTML('beforebegin', wrapperHTML)
        this.wrapperEl = this.selectEl.previousElementSibling
        this.wrapperEl.appendChild(this.selectEl)
            // Generate rendered
        const selectedOption = this.selectEl.options[this.selectEl.selectedIndex]
        const selectedOptionText = selectedOption.textContent
        this.renderedEl = document.createElement('button')
        this.renderedEl.type = 'button'
        this.renderedEl.className = this.options.classNames.renderedEl
        this.wrapperEl.appendChild(this.renderedEl)
        this.renderedTextEl = document.createElement('span')
        this.renderedTextEl.className = this.options.classNames.renderedTextEl
        this.renderedTextEl.textContent = selectedOptionText;
        this.renderedEl.appendChild(this.renderedTextEl)
            // Generate options wrapper
        this.optionsEl = document.createElement('div')
        this.optionsEl.className = this.options.classNames.optionsEl
        this.wrapperEl.appendChild(this.optionsEl)
            // Generate search
        if ([...this.selectEl.options].length >= this.options.minimumOptionsForSearch) {
            this.searchEl = document.createElement('input')
            this.searchEl.type = 'text'
            this.searchEl.className = this.options.classNames.searchEl
            this.optionsEl.appendChild(this.searchEl)
        }
        // Generate each option
        const selectOptions = [...this.selectEl.options]
        this.optionEls = []
        for (const option of selectOptions) {
            if (option.disabled) {
                continue
            }
            const newOption = document.createElement('button')
            newOption.type = 'button'
            newOption.className = this.options.classNames.optionEl
            newOption.textContent = option.textContent
            newOption.setAttribute('data-value', option.value)
            if (option.selected) {
                newOption.classList.add(this.options.classNames.selected)
                this.renderedTextEl.textContent = newOption.textContent;
            }
            this.optionsEl.appendChild(newOption)
            this.optionEls.push(newOption)
        }
    }

    open(callback) {
        this.wrapperEl.classList.add(this.options.classNames.open)
            // Handle optionsEl position
        this.handleOptionsElPosition()
            // Handle search
        if (this.searchEl !== null) {
            this.resetSearch()
            this.searchEl.focus()
        }
        // Handle callback functions
        if (typeof this.options.onOpen === 'function') {
            this.options.onOpen(this)
        }
        if (typeof callback === 'function') {
            callback(this)
        }
    }

    close(callback) {
        this.wrapperEl.classList.remove(this.options.classNames.open)
            // Handle callback functions
        if (typeof this.options.onClose === 'function') {
            this.options.onClose(this)
        }
        if (typeof callback === 'function') {
            callback(this)
        }
    }

    toggle(callback) {
        if (!this.wrapperEl.classList.contains(this.options.classNames.open)) {
            this.open()
        } else {
            this.close()
        }
        // Handle callback functions
        if (typeof this.options.onToggle === 'function') {
            this.options.onToggle(this)
        }
        if (typeof callback === 'function') {
            callback(this)
        }
    }


    handleOptionsElPosition() {
        this.optionsEl.classList.remove(this.options.classNames.onTop)
        const boundingRect = this.optionsEl.getBoundingClientRect()
        const isOutTop = boundingRect.top < 0
        const isOutBottom = boundingRect.bottom > (window.innerHeight || document.documentElement.clientHeight)
        if (isOutBottom) {
            this.optionsEl.classList.add(this.options.classNames.onTop)
        }
        if (isOutTop) {
            this.optionsEl.classList.remove(this.options.classNames.onTop)
        }
    }


    resetSearch() {
        this.searchEl.value = ''
        for (const optionEl of this.optionEls) {
            optionEl.classList.remove(this.options.classNames.hidden)
        }
    }


    handleSearchFn() {
        for (const optionEl of this.optionEls) {
            if (optionEl.textContent.toLowerCase().indexOf(this.searchEl.value.toLowerCase()) > -1) {
                optionEl.classList.remove(this.options.classNames.hidden)
            } else {
                optionEl.classList.add(this.options.classNames.hidden)
            }
        }
    }


    optionElClickFn(event) {
        // Close the select
        this.close()
            // Cache the target
        const target = event.target
            // Check if click selected option
        if (this.selectEl.value === target.dataset.value) {
            return
        }
        // Handle rendered text
        this.renderedTextEl.textContent = target.textContent
            // Handle select element change
        Array.from(this.selectEl.options).forEach(element => {
            if (element.value === target.dataset.value) {
                element.setAttribute("selected", '');
            } else {
                element.removeAttribute("selected");
            }
        });
        //this.selectEl.value = target.dataset.value
        const triggerEvent = new Event('change')
        this.selectEl.dispatchEvent(triggerEvent)
            // Highlight selected
        for (const optionEl of this.optionEls) {
            optionEl.classList.remove(this.options.classNames.selected)
        }
        target.classList.add(this.options.classNames.selected)
    }


    clickOutsideFn(event) {
        const isOutside = event.target.closest(`.${this.options.classNames.wrapperEl}`) !== this.wrapperEl
        const isOpen = this.wrapperEl.classList.contains(this.options.classNames.open)
        if (isOutside && isOpen) {
            this.close()
        }
    }


    escPressFn(event) {
        const isEsc = event.keyCode === 27
        const isOpen = this.wrapperEl.classList.contains(this.options.classNames.open)
        if (isEsc && isOpen) {
            this.close()
        }
    }


    addEvents() {
        this.renderedEl.addEventListener('click', this.toggle)
        if (this.searchEl !== null) {
            this.searchEl.addEventListener('input', this.handleSearch)
        }
        for (const optionEl of this.optionEls) {
            optionEl.addEventListener('click', this.optionElClick)
        }
        document.addEventListener('click', this.clickOutside)
        document.addEventListener('keyup', this.escPress)
    }

    destroy() {
        // Check if already init
        if (!this.selectEl.classList.contains(this.options.classNames.init)) {
            console.error(`CustomSelect not initialized. ID: ${this.selectEl.id}`)
            return
        }
        // Remove Events
        document.removeEventListener('click', this.clickOutside)
        document.removeEventListener('keyup', this.escPress)
            // Unwrap
        this.wrapperEl.replaceWith(this.selectEl)
            // Clear select element
        this.selectEl.removeAttribute('tabindex')
        this.selectEl.classList.remove(this.options.classNames.selectEl)
        this.selectEl.classList.remove(this.options.classNames.init)
    }
}

function uuid() {
    return (Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15)).slice(0, 20);
}

function deepMerge(...objects) {
    const isObject = (obj) => obj && typeof obj === 'object'
    return objects.reduce((prev, obj) => {
        Object.keys(obj).forEach((key) => {
            const pVal = prev[key]
            const oVal = obj[key]
            if (Array.isArray(pVal) && Array.isArray(oVal)) {
                prev[key] = pVal.concat(...oVal)
            } else if (isObject(pVal) && isObject(oVal)) {
                prev[key] = deepMerge(pVal, oVal)
            } else {
                prev[key] = oVal
            }
        })
        return prev
    }, {})
}

function togglePasswordVisibility() {
    const triggers = document.querySelectorAll("[data-password-trigger]");
    triggers.forEach(trigger => {
        const selector = trigger.dataset.target;
        if (!selector) return;

        const targets = document.querySelectorAll(selector.trim());
        if (!targets.length) return;

        trigger.addEventListener("click", () => {
            targets.forEach(target => {
                if (target.tagName !== "INPUT") return;

                switch (target.type) {
                    case "text":
                        target.type = "password";
                        break;
                    case "password":
                        target.type = "text";
                        break;
                }

                const selectors = trigger.dataset.mutable && trigger.dataset.mutable.split("|");
                if (!selectors) return;

                for (const selector of selectors) {
                    const elements = document.querySelectorAll(selector.trim());
                    elements.forEach(element => {
                        element.classList.toggle("hidden")
                    })
                }

            })
        })
    })
}

function toggleElementVisibility() {
    const triggers = document.querySelectorAll("[data-element-trigger]");
    triggers.forEach(trigger => {
        const selector = trigger.dataset.target;
        if (!selector) return;

        const targets = document.querySelectorAll(selector.trim());
        if (!targets.length) return;

        trigger.addEventListener("click", () => {
            targets.forEach(target => {
                target.classList.toggle("hidden")

                const selectors = trigger.dataset.mutable && trigger.dataset.mutable.split("|");
                if (!selectors) return;

                for (const selector of selectors) {
                    const elements = document.querySelectorAll(selector.trim());
                    elements.forEach(element => {
                        element.classList.toggle("hidden")
                    })
                }

            })
        })
    })
}

function previewElementFile(type) {
    return function() {
        const triggers = document.querySelectorAll("[data-element-preview]");
        triggers.forEach(trigger => {
            const selector = trigger.dataset.target;
            if (!selector) return;

            const targets = document.querySelectorAll(selector.trim());
            if (!targets.length) return;

            trigger.addEventListener("change", (e) => {
                var src, txt;
                if (e.target.files.length > 0) {
                    src = URL.createObjectURL(e.target.files[0]);
                    txt = e.target.files[0].name;
                }
                targets.forEach(target => {
                    switch (type) {
                        case "img":
                            target.src = src;
                            break;
                        case "txt":
                            target.innerText = txt;
                            break;
                    }
                })
            })
        })
    }
}

function copyElementText() {
    const triggers = document.querySelectorAll("[data-element-copy]");
    triggers.forEach(trigger => {
        const selector = trigger.dataset.target;
        if (!selector) return;

        const target = document.querySelector(selector.trim());
        if (!target) return;

        trigger.addEventListener("click", () => {
            target.select();
            document.execCommand("copy");
        });
    });
}

function generatePassword() {
    const targets = document.querySelectorAll("[data-element-generate]");
    targets.forEach(target => {
        const password = uuid();
        if ("value" in target) {
            target.value = password
        } else {
            target.innerText = password
        }
    });
}

function createSelectElement() {
    const targets = document.querySelectorAll("[data-custom-select]")
    for (var target of targets) {
        new CustomSelect(target, {
            minimumOptionsForSearch: 0,
        })
    }
}

function createDateElement() {
    const targets = document.querySelectorAll("[data-custom-date]")
    for (var target of targets) {
        new Datepicker(target, {
            autohide: true,
            format: "yyyy-mm-dd",
        });
    }
}

function createStyleElement() {
    var targets = document.querySelectorAll("[style]");
    var style = document.querySelector("style")
    for (var target of targets) {
        const css = target.getAttribute("style");
        const cls = "_" + uuid();
        const txt = document.createTextNode(`.${cls} {${css}}`)
        target.removeAttribute("style")
        target.classList.add(cls);
        style.append(txt);
    }
}

const Toaster = {
    func: function(message, type) {
        if (!document.querySelector("[data-custom-toaster")) {
            var style = document.createElement("style");
            var text = document.createTextNode(`
                .toaster-element {
                    transform: translateX(140%);
                    animation: slide 250ms ease-in-out forwards;
                    z-index: 100;
                    box-shadow: rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px;
                    max-width: calc(100% - 32px)
                }
                @keyframes slide {
                    0% { transform: traslateX(140%) }
                    100% { transform: translateX(0) }
                }
            `);
            style.dataset.customToaster = "";
            style.append(text);
            document.head.append(style)
        }
        if (el = document.querySelector(".toaster-element")) el.remove();
        var div = document.createElement("div")
        div.className = "toaster-element w-full md:w-1/3 text-white text-md p-4 hover:opacity-100 fixed bottom-4 right-4 rounded-md";
        div.style.background = type
        div.innerText = message;
        document.body.append(div)
        setTimeout(() => {
            div.classList.add("opacity-50")
        }, 2000);
        setTimeout(() => {
            div.remove();
        }, 8000);
    },
    success: function(message) {
        this.func(message, "#04AA6D")
    },
    info: function(message) {
        this.func(message, "#2196F3")
    },
    warn: function(message) {
        this.func(message, "#ff9800")
    },
    error: function(message) {
        this.func(message, "#f44336")
    }
}

const Starter = {
    funcs: [],
    add(...functions) {
        for (const func of functions) {
            var exsits;
            for (const fn of this.funcs) {
                if (fn.toString() === func.toString()) {
                    exsits = true;
                    break;
                }
            }
            if (!exsits)
                this.funcs.push(func)
        }
        return this
    },
    init() {
        for (const func of this.funcs) func()
    }
}