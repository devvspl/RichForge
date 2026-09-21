var k = Object.defineProperty;
var H = (a, e, t) => e in a ? k(a, e, { enumerable: !0, configurable: !0, writable: !0, value: t }) : a[e] = t;
var l = (a, e, t) => H(a, typeof e != "symbol" ? e + "" : e, t);
class x {
  constructor(e) {
    l(this, "core");
    l(this, "element");
    this.core = e, this.element = document.createElement("div"), this.element.className = "rf-toolbar", this.render();
  }
  render() {
    this.element.innerHTML = "";
    const e = this.core.options.toolbar || [], t = {}, o = (s) => {
      if (!t[s]) {
        const i = document.createElement("div");
        i.className = "rf-toolbar-group", this.element.appendChild(i), t[s] = i;
      }
      return t[s];
    };
    e.forEach((s) => {
      switch (s) {
        case "undo":
          this.addButton(o("history"), "undo", "Undo (Ctrl+Z)", '<svg viewBox="0 0 24 24"><path d="M12.5 8c-2.65 0-5.05.99-6.9 2.6L2 7v9h9l-3.62-3.62c1.39-1.16 3.16-1.88 5.12-1.88 3.54 0 6.55 2.31 7.6 5.5l2.37-.78C21.08 11.03 17.15 8 12.5 8z"/></svg>', () => this.core.exec("undo"));
          break;
        case "redo":
          this.addButton(o("history"), "redo", "Redo (Ctrl+Y)", '<svg viewBox="0 0 24 24"><path d="M18.4 10.6C16.55 8.99 14.15 8 11.5 8c-4.65 0-8.58 3.03-9.96 7.22L3.9 16c1.05-3.19 4.06-5.5 7.6-5.5 1.96 0 3.73.72 5.12 1.88L13 16h9V7l-3.6 3.6z"/></svg>', () => this.core.exec("redo"));
          break;
        case "heading":
          this.addHeadingSelect(o("text-format"));
          break;
        case "bold":
          this.addFormatButton(o("style"), "bold", "Bold (Ctrl+B)", '<svg viewBox="0 0 24 24"><path d="M15.6 10.79c.92-.67 1.4-1.64 1.4-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.96-1.52 3.96-3.79 0-1.55-.92-2.82-2.4-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z"/></svg>', "bold");
          break;
        case "italic":
          this.addFormatButton(o("style"), "italic", "Italic (Ctrl+I)", '<svg viewBox="0 0 24 24"><path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z"/></svg>', "italic");
          break;
        case "underline":
          this.addFormatButton(o("style"), "underline", "Underline (Ctrl+U)", '<svg viewBox="0 0 24 24"><path d="M12 17c3.31 0 6-2.69 6-6V3h-2.5v8c0 1.93-1.57 3.5-3.5 3.5S8.5 12.93 8.5 11V3H6v8c0 3.31 2.69 6 6 6zm-7 2v2h14v-2H5z"/></svg>', "underline");
          break;
        case "strike":
          this.addFormatButton(o("style"), "strikeThrough", "Strikethrough", '<svg viewBox="0 0 24 24"><path d="M10 19h4v-3h-4v3zM5 4v3h5v3h4V7h5V4H5zM3 14h18v-2H3v2z"/></svg>', "strikeThrough");
          break;
        case "textColor":
          this.addColorPicker(o("colors"), "foreColor", "Text Color", '<svg viewBox="0 0 24 24"><path d="M0 20h24v4H0z" fill="currentColor"/><path d="M11 3L5.5 17h2.25l1.12-3h6.25l1.12 3h2.26L13 3h-2zm-1.38 9L12 5.67 14.38 12H9.62z"/></svg>');
          break;
        case "highlight":
          this.addColorPicker(o("colors"), "hiliteColor", "Highlight Color", '<svg viewBox="0 0 24 24"><path d="M16.56 8.94L7.62 17.88l-2.12-2.12 8.94-8.94 2.12 2.12zM19 3l-2.5 2.5 2.5 2.5L21.5 5.5 19 3zM3 21h4l9.5-9.5-4-4L3 17v4z"/></svg>');
          break;
        case "alignment":
          this.addButton(o("align"), "justifyLeft", "Align Left", '<svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm0-4h12v-2H3v2zm0-4h18v-2H3v2zm0-4h12V7H3v2zm0-6v2h18V3H3z"/></svg>', () => this.core.exec("justifyLeft")), this.addButton(o("align"), "justifyCenter", "Align Center", '<svg viewBox="0 0 24 24"><path d="M7 15v2h10v-2H7zm-4 6h18v-2H3v2zm0-8h18v-2H3v2zm4-6v2h10V7H7zM3 3v2h18V3H3z"/></svg>', () => this.core.exec("justifyCenter")), this.addButton(o("align"), "justifyRight", "Align Right", '<svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm6-4h12v-2H9v2zm-6-4h18v-2H3v2zm6-4h12V7H9v2zm-6-6v2h18V3H3z"/></svg>', () => this.core.exec("justifyRight"));
          break;
        case "bulletList":
          this.addFormatButton(o("list"), "insertUnorderedList", "Bullet List", '<svg viewBox="0 0 24 24"><path d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5 5.5 6.83 5.5 6 4.83 4.5 4 4.5zm0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5 1.5-.68 1.5-1.5-.67-1.5-1.5-1.5zM7 19h14v-2H7v2zm0-6h14v-2H7v2zm0-8v2h14V5H7z"/></svg>', "insertUnorderedList");
          break;
        case "numberList":
          this.addFormatButton(o("list"), "insertOrderedList", "Numbered List", '<svg viewBox="0 0 24 24"><path d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z"/></svg>', "insertOrderedList");
          break;
        case "link":
          this.addButton(o("insert"), "link", "Insert Link", '<svg viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>', () => this.core.promptInsertLink());
          break;
        case "image":
          this.addButton(o("insert"), "image", "Insert Image", '<svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>', () => this.core.promptInsertImage());
          break;
        case "table":
          this.addButton(o("insert"), "table", "Insert Table", '<svg viewBox="0 0 24 24"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zm-9 5v4H4v-4h7zm2 0h7v4h-7v-4zm-9 9v-4h7v4H4zm9 0v-4h7v4h-7z"/></svg>', () => this.core.promptInsertTable());
          break;
        case "blockquote":
          this.addFormatButton(o("format"), "blockquote", "Blockquote", '<svg viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>', "formatBlock", "blockquote");
          break;
        case "codeBlock":
          this.addFormatButton(o("format"), "pre", "Code Block", '<svg viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>', "formatBlock", "pre");
          break;
        case "horizontalRule":
          this.addButton(o("format"), "hr", "Horizontal Rule", '<svg viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2z"/></svg>', () => this.core.exec("insertHorizontalRule"));
          break;
        case "fullscreen":
          this.addButton(o("tools"), "fullscreen", "Toggle Fullscreen", '<svg viewBox="0 0 24 24"><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg>', () => this.core.toggleFullscreen());
          break;
        case "source":
          this.addButton(o("tools"), "source", "HTML Source", '<svg viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>', () => this.core.toggleSourceView());
          break;
      }
    });
  }
  addButton(e, t, o, s, i) {
    const n = document.createElement("button");
    n.type = "button", n.className = "rf-btn", n.title = o, n.innerHTML = s, n.addEventListener("click", (r) => {
      r.preventDefault(), i();
    }), e.appendChild(n);
  }
  addFormatButton(e, t, o, s, i, n) {
    const r = document.createElement("button");
    r.type = "button", r.className = "rf-btn", r.dataset.command = t, r.title = o, r.innerHTML = s, r.addEventListener("click", (c) => {
      c.preventDefault(), this.core.exec(i || t, n);
    }), e.appendChild(r);
  }
  addHeadingSelect(e) {
    const t = document.createElement("select");
    t.className = "rf-select", t.innerHTML = `
      <option value="p">Paragraph</option>
      <option value="h1">Heading 1</option>
      <option value="h2">Heading 2</option>
      <option value="h3">Heading 3</option>
      <option value="h4">Heading 4</option>
    `, t.addEventListener("change", () => {
      const o = t.value;
      this.core.exec("formatBlock", o === "p" ? "p" : o);
    }), e.appendChild(t);
  }
  addColorPicker(e, t, o, s) {
    const i = document.createElement("label");
    i.className = "rf-btn rf-color-btn", i.title = o, i.innerHTML = `
      ${s}
      <input type="color" value="#4f46e5">
    `;
    const n = i.querySelector("input");
    n.addEventListener("change", () => {
      this.core.exec(t, n.value);
    }), e.appendChild(i);
  }
}
class T {
  constructor() {
    l(this, "overlay", null);
  }
  show(e, t, o) {
    this.close(), this.overlay = document.createElement("div"), this.overlay.className = "rf-modal-overlay", this.overlay.innerHTML = `
      <div class="rf-modal-container">
        <!-- Header -->
        <div class="rf-modal-header">
          <div class="rf-modal-header-left">
            <div class="rf-modal-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
              </svg>
            </div>
            <h3 class="rf-modal-title">Insert / Edit Link</h3>
          </div>
          <button type="button" class="rf-modal-close-btn" aria-label="Close">&times;</button>
        </div>

        <!-- Body -->
        <div class="rf-modal-body">
          <!-- URL Field -->
          <div class="rf-field-group">
            <label class="rf-field-label">URL <span class="rf-required">*</span></label>
            <input type="text" class="rf-input rf-input-url" placeholder="https://7xbasket.com/" value="${e.url || "https://"}" />
          </div>

          <!-- LINK TEXT Field -->
          <div class="rf-field-group">
            <label class="rf-field-label">LINK TEXT</label>
            <input type="text" class="rf-input rf-input-text" placeholder="Supermarket Franchise in India" value="${e.text || ""}" />
            <p class="rf-field-hint">If blank, the currently selected text will be used.</p>
          </div>

          <!-- Open in new tab Card -->
          <div class="rf-option-card">
            <div class="rf-option-card-info">
              <div class="rf-option-card-title">Open in new tab</div>
              <div class="rf-option-card-subtext">
                Adds <code>target="_blank"</code> + <code>rel="noopener"</code>
              </div>
            </div>
            <label class="rf-switch">
              <input type="checkbox" class="rf-toggle-tab" ${e.openInNewTab ? "checked" : ""} />
              <span class="rf-slider"></span>
            </label>
          </div>

          <!-- LINK RELATIONSHIP (rel attribute) -->
          <div class="rf-field-group">
            <label class="rf-field-label">LINK RELATIONSHIP <span class="rf-label-sub">(rel attribute)</span></label>
            <div class="rf-rel-grid">
              <!-- Do Follow -->
              <label class="rf-rel-card ${e.rel !== "nofollow" ? "rf-rel-selected" : ""}">
                <div class="rf-rel-card-header">
                  <input type="radio" name="rf_rel_option" value="dofollow" ${e.rel !== "nofollow" ? "checked" : ""} />
                  <span class="rf-rel-icon rf-rel-icon-check">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                      <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                  </span>
                  <span class="rf-rel-title">Do Follow</span>
                </div>
                <p class="rf-rel-subtext">Passes SEO value to the linked page. Use for trusted links.</p>
              </label>

              <!-- No Follow -->
              <label class="rf-rel-card ${e.rel === "nofollow" ? "rf-rel-selected" : ""}">
                <div class="rf-rel-card-header">
                  <input type="radio" name="rf_rel_option" value="nofollow" ${e.rel === "nofollow" ? "checked" : ""} />
                  <span class="rf-rel-icon rf-rel-icon-prohibit">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                    </svg>
                  </span>
                  <span class="rf-rel-title">No Follow</span>
                </div>
                <p class="rf-rel-subtext">Tells search engines not to follow or pass SEO value.</p>
              </label>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="rf-modal-footer">
          <div class="rf-modal-footer-left">
            ${e.isEditing ? `
              <button type="button" class="rf-btn-remove-link">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>
                Remove Link
              </button>
            ` : ""}
          </div>
          <div class="rf-modal-footer-right">
            <button type="button" class="rf-btn-cancel">Cancel</button>
            <button type="button" class="rf-btn-submit">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              ${e.isEditing ? "Update Link" : "Insert Link"}
            </button>
          </div>
        </div>
      </div>
    `, document.body.appendChild(this.overlay);
    const s = this.overlay.querySelector(".rf-input-url"), i = this.overlay.querySelector(".rf-input-text"), n = this.overlay.querySelector(".rf-toggle-tab"), r = this.overlay.querySelector(".rf-modal-close-btn"), c = this.overlay.querySelector(".rf-btn-cancel"), u = this.overlay.querySelector(".rf-btn-submit"), p = this.overlay.querySelector(".rf-btn-remove-link"), m = this.overlay.querySelectorAll(".rf-rel-card");
    setTimeout(() => {
      s.focus(), s.value === "https://" && s.setSelectionRange(s.value.length, s.value.length);
    }, 50), m.forEach((h) => {
      h.addEventListener("click", () => {
        m.forEach((f) => f.classList.remove("rf-rel-selected")), h.classList.add("rf-rel-selected");
        const d = h.querySelector('input[type="radio"]');
        d && (d.checked = !0);
      });
    }), this.overlay.addEventListener("click", (h) => {
      h.target === this.overlay && this.close();
    }), r.addEventListener("click", () => this.close()), c.addEventListener("click", () => this.close()), p && o && p.addEventListener("click", () => {
      this.close(), o();
    }), u.addEventListener("click", () => {
      var E;
      const h = s.value.trim();
      if (!h || h === "https://") {
        s.style.borderColor = "#ef4444", s.focus();
        return;
      }
      const d = (E = this.overlay) == null ? void 0 : E.querySelector('input[name="rf_rel_option"]:checked'), f = (d == null ? void 0 : d.value) === "nofollow" ? "nofollow" : "dofollow", L = {
        url: h,
        text: i.value.trim(),
        openInNewTab: n.checked,
        rel: f,
        isEditing: e.isEditing
      };
      this.close(), t(L);
    });
  }
  close() {
    this.overlay && this.overlay.parentNode && (this.overlay.parentNode.removeChild(this.overlay), this.overlay = null);
  }
}
const C = /* @__PURE__ */ new Set([
  "h1",
  "h2",
  "h3",
  "h4",
  "h5",
  "h6",
  "p",
  "div",
  "span",
  "br",
  "hr",
  "strong",
  "b",
  "em",
  "i",
  "u",
  "s",
  "strike",
  "sub",
  "sup",
  "mark",
  "ul",
  "ol",
  "li",
  "blockquote",
  "pre",
  "code",
  "a",
  "img",
  "video",
  "source",
  "iframe",
  "table",
  "thead",
  "tbody",
  "tfoot",
  "tr",
  "th",
  "td"
]), M = /* @__PURE__ */ new Set([
  "href",
  "src",
  "alt",
  "title",
  "target",
  "rel",
  "width",
  "height",
  "style",
  "class",
  "align",
  "colspan",
  "rowspan",
  "controls",
  "frameborder",
  "allowfullscreen"
]);
function v(a) {
  if (!a) return "";
  const t = new DOMParser().parseFromString(a, "text/html");
  return w(t.body), t.body.innerHTML;
}
function w(a) {
  const e = Array.from(a.childNodes);
  for (const t of e)
    if (t.nodeType === Node.ELEMENT_NODE) {
      const o = t, s = o.tagName.toLowerCase();
      if (!C.has(s))
        if (["script", "style", "object", "embed", "form"].includes(s)) {
          o.remove();
          continue;
        } else {
          const n = document.createTextNode(o.textContent || "");
          o.replaceWith(n);
          continue;
        }
      const i = Array.from(o.attributes);
      for (const n of i) {
        const r = n.name.toLowerCase();
        if (r.startsWith("on") || !M.has(r)) {
          o.removeAttribute(n.name);
          continue;
        }
        if (["href", "src"].includes(r)) {
          const c = n.value.trim().toLowerCase();
          (c.startsWith("javascript:") || c.startsWith("vbscript:")) && o.removeAttribute(n.name);
        }
      }
      w(o);
    }
}
const b = class b {
  constructor(e, t = {}) {
    l(this, "targetElement");
    l(this, "options");
    l(this, "wrapperEl");
    l(this, "toolbar");
    l(this, "contentEl");
    l(this, "sourceEl");
    l(this, "statusbarEl");
    l(this, "wordCountEl");
    l(this, "isSourceView", !1);
    l(this, "isFullscreen", !1);
    if (typeof e == "string") {
      const o = document.querySelector(e);
      if (!o)
        throw new Error(`RichForge: Target element "${e}" not found.`);
      this.targetElement = o;
    } else
      this.targetElement = e;
    this.options = {
      projectKey: "",
      height: 350,
      placeholder: "Start writing your content here...",
      toolbar: b.defaultToolbar,
      upload: { enabled: !0, endpoint: "/api/v1/upload", maxSizeMb: 10 },
      darkMode: !1,
      theme: "default",
      ...t
    }, this.init();
  }
  init() {
    this.targetElement.style.display = "none", this.wrapperEl = document.createElement("div"), this.wrapperEl.className = "rf-wrapper", this.options.darkMode && this.wrapperEl.classList.add("rf-theme-dark"), typeof this.options.theme == "string" ? this.wrapperEl.classList.add(`rf-theme-${this.options.theme}`) : typeof this.options.theme == "object" && (this.options.theme.primaryColor && this.wrapperEl.style.setProperty("--rf-primary", this.options.theme.primaryColor), this.options.theme.borderRadius && this.wrapperEl.style.setProperty("--rf-radius", this.options.theme.borderRadius)), this.toolbar = new x(this), this.wrapperEl.appendChild(this.toolbar.element), this.contentEl = document.createElement("div"), this.contentEl.className = "rf-content", this.contentEl.contentEditable = "true", this.options.placeholder && this.contentEl.setAttribute("placeholder", this.options.placeholder);
    const e = typeof this.options.height == "number" ? `${this.options.height}px` : this.options.height;
    e && (this.contentEl.style.minHeight = e);
    let t = "";
    this.targetElement instanceof HTMLTextAreaElement || this.targetElement instanceof HTMLInputElement ? t = this.targetElement.value : t = this.targetElement.innerHTML, this.contentEl.innerHTML = v(t), this.wrapperEl.appendChild(this.contentEl), this.sourceEl = document.createElement("textarea"), this.sourceEl.className = "rf-source-textarea", this.sourceEl.style.display = "none", e && (this.sourceEl.style.minHeight = e), this.wrapperEl.appendChild(this.sourceEl), this.statusbarEl = document.createElement("div"), this.statusbarEl.className = "rf-statusbar", this.statusbarEl.innerHTML = `
      <div class="rf-statusbar-left">
        <span class="rf-brand-tag">⚡ RichForge</span>
      </div>
      <div class="rf-statusbar-right">
        <span class="rf-word-count">0 words | 0 chars</span>
      </div>
    `, this.wordCountEl = this.statusbarEl.querySelector(".rf-word-count"), this.wrapperEl.appendChild(this.statusbarEl), this.targetElement.parentNode && this.targetElement.parentNode.insertBefore(this.wrapperEl, this.targetElement.nextSibling), this.bindEvents(), this.updateWordCount(), this.options.onReady && this.options.onReady(this);
  }
  bindEvents() {
    this.contentEl.addEventListener("input", () => {
      this.syncToTarget(), this.updateWordCount(), this.options.onChange && this.options.onChange(this.getHTML());
    }), this.contentEl.addEventListener("focus", () => {
      this.options.onFocus && this.options.onFocus();
    }), this.contentEl.addEventListener("blur", () => {
      this.options.onBlur && this.options.onBlur();
    }), this.contentEl.addEventListener("dragover", (e) => e.preventDefault()), this.contentEl.addEventListener("drop", (e) => {
      e.preventDefault(), e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length > 0 && this.handleFileUpload(e.dataTransfer.files[0]);
    }), this.contentEl.addEventListener("paste", (e) => {
      if (e.clipboardData && e.clipboardData.items) {
        for (const t of Array.from(e.clipboardData.items))
          if (t.type.indexOf("image") !== -1) {
            const o = t.getAsFile();
            if (o) {
              e.preventDefault(), this.handleFileUpload(o);
              break;
            }
          }
      }
    }), this.sourceEl.addEventListener("input", () => {
      this.contentEl.innerHTML = v(this.sourceEl.value), this.syncToTarget(), this.options.onChange && this.options.onChange(this.getHTML());
    });
  }
  exec(e, t = "") {
    this.contentEl.focus(), document.execCommand(e, !1, t), this.syncToTarget(), this.updateWordCount(), this.options.onChange && this.options.onChange(this.getHTML());
  }
  syncToTarget() {
    const e = this.getHTML();
    this.targetElement instanceof HTMLTextAreaElement || this.targetElement instanceof HTMLInputElement ? this.targetElement.value = e : this.targetElement.innerHTML = e;
  }
  updateWordCount() {
    const t = (this.contentEl.innerText || "").trim(), o = t ? t.split(/\s+/).length : 0, s = t.length;
    this.wordCountEl.textContent = `${o} words | ${s} chars`;
  }
  getHTML() {
    return this.isSourceView ? v(this.sourceEl.value) : v(this.contentEl.innerHTML);
  }
  getText() {
    return this.contentEl.innerText || "";
  }
  setHTML(e) {
    const t = v(e);
    this.contentEl.innerHTML = t, this.sourceEl.value = t, this.syncToTarget(), this.updateWordCount();
  }
  getData() {
    return this.getHTML();
  }
  setData(e) {
    this.setHTML(e);
  }
  focus() {
    this.isSourceView ? this.sourceEl.focus() : this.contentEl.focus();
  }
  toggleSourceView() {
    this.isSourceView = !this.isSourceView, this.isSourceView ? (this.sourceEl.value = this.getHTML(), this.contentEl.style.display = "none", this.sourceEl.style.display = "block") : (this.contentEl.innerHTML = v(this.sourceEl.value), this.sourceEl.style.display = "none", this.contentEl.style.display = "block");
  }
  toggleFullscreen() {
    this.isFullscreen = !this.isFullscreen, this.isFullscreen ? this.wrapperEl.classList.add("rf-fullscreen") : this.wrapperEl.classList.remove("rf-fullscreen");
  }
  handleFileUpload(e) {
    var s;
    if (!((s = this.options.upload) != null && s.enabled)) {
      alert("Upload feature is disabled for this editor.");
      return;
    }
    const t = new FormData();
    t.append("file", e), t.append("project_key", this.options.projectKey || "");
    const o = this.options.upload.endpoint || "/api/v1/upload";
    fetch(o, {
      method: "POST",
      body: t,
      headers: {
        Accept: "application/json",
        "X-Project-Key": this.options.projectKey || ""
      }
    }).then((i) => i.json()).then((i) => {
      if (i.success && i.data && i.data.url)
        e.type.startsWith("image/") ? this.exec("insertImage", i.data.url) : this.exec("createLink", i.data.url), this.options.onUpload && this.options.onUpload(i.data);
      else {
        const n = i.message || "File upload failed.";
        this.options.onError ? this.options.onError({ code: "UPLOAD_FAILED", message: n }) : alert(`RichForge Upload Error: ${n}`);
      }
    }).catch((i) => {
      const n = "RichForge could not connect to the upload service.";
      this.options.onError ? this.options.onError({ code: "NETWORK_ERROR", message: n }) : alert(n);
    });
  }
  promptInsertLink() {
    var n;
    this.contentEl.focus();
    let e = null;
    const t = window.getSelection();
    let o = "";
    if (t && t.rangeCount > 0) {
      o = t.toString();
      let r = t.getRangeAt(0).startContainer;
      for (; r && r !== this.contentEl; ) {
        if (r.nodeName === "A") {
          e = r;
          break;
        }
        r = r.parentNode;
      }
    }
    const s = {
      url: e && e.getAttribute("href") || "",
      text: e ? e.textContent || "" : o,
      openInNewTab: e ? e.getAttribute("target") === "_blank" : !1,
      rel: e && ((n = e.getAttribute("rel")) != null && n.includes("nofollow")) ? "nofollow" : "dofollow",
      isEditing: !!e
    };
    new T().show(
      s,
      (r) => {
        this.contentEl.focus();
        const c = [];
        r.openInNewTab && c.push("noopener"), r.rel === "nofollow" && c.push("nofollow");
        const u = c.join(" "), p = r.openInNewTab ? "_blank" : null;
        if (e)
          e.setAttribute("href", r.url), p ? e.setAttribute("target", p) : e.removeAttribute("target"), u ? e.setAttribute("rel", u) : e.removeAttribute("rel"), r.text && (e.textContent = r.text);
        else {
          const m = r.text || o || r.url, h = p ? ` target="${p}"` : "", d = u ? ` rel="${u}"` : "", f = `<a href="${r.url}"${h}${d}>${m}</a>`;
          this.exec("insertHTML", f);
        }
        this.syncToTarget(), this.updateWordCount(), this.options.onChange && this.options.onChange(this.getHTML());
      },
      () => {
        var r;
        if (e) {
          const c = document.createTextNode(e.textContent || "");
          (r = e.parentNode) == null || r.replaceChild(c, e), this.syncToTarget(), this.updateWordCount(), this.options.onChange && this.options.onChange(this.getHTML());
        }
      }
    );
  }
  promptInsertImage() {
    if (confirm("Click OK to upload an image from your device, or Cancel to enter an Image URL.")) {
      const t = document.createElement("input");
      t.type = "file", t.accept = "image/*", t.onchange = (o) => {
        const s = o.target;
        s.files && s.files[0] && this.handleFileUpload(s.files[0]);
      }, t.click();
    } else {
      const t = prompt("Enter Image URL:");
      t && this.exec("insertImage", t);
    }
  }
  promptInsertTable() {
    const e = parseInt(prompt("Number of rows:", "3") || "0", 10), t = parseInt(prompt("Number of columns:", "3") || "0", 10);
    if (e > 0 && t > 0) {
      let o = '<table border="1"><tbody>';
      for (let s = 0; s < e; s++) {
        o += "<tr>";
        for (let i = 0; i < t; i++)
          o += s === 0 ? "<th>Header</th>" : "<td>Cell</td>";
        o += "</tr>";
      }
      o += "</tbody></table>", this.exec("insertHTML", o);
    }
  }
  destroy() {
    this.wrapperEl && this.wrapperEl.parentNode && this.wrapperEl.parentNode.removeChild(this.wrapperEl), this.targetElement.style.display = "";
  }
};
l(b, "defaultToolbar", [
  "undo",
  "redo",
  "heading",
  "bold",
  "italic",
  "underline",
  "strike",
  "textColor",
  "highlight",
  "alignment",
  "bulletList",
  "numberList",
  "link",
  "image",
  "table",
  "blockquote",
  "codeBlock",
  "horizontalRule",
  "source",
  "fullscreen"
]);
let g = b;
class y {
  static create(e, t) {
    return new g(e, t);
  }
  static init(e, t) {
    return new g(e, t);
  }
}
typeof window < "u" && (window.RichForge = y, window.RichForgeEditor = y);
export {
  y as RichForge,
  g as RichForgeCore,
  y as default
};
