(function(h,v){typeof exports=="object"&&typeof module<"u"?v(exports):typeof define=="function"&&define.amd?define(["exports"],v):(h=typeof globalThis<"u"?globalThis:h||self,v(h.RichForge={}))})(this,function(h){"use strict";var R=Object.defineProperty;var $=(h,v,y)=>v in h?R(h,v,{enumerable:!0,configurable:!0,writable:!0,value:y}):h[v]=y;var c=(h,v,y)=>$(h,typeof v!="symbol"?v+"":v,y);class v{constructor(e){c(this,"core");c(this,"element");this.core=e,this.element=document.createElement("div"),this.element.className="rf-toolbar",this.render()}render(){this.element.innerHTML="";const e=this.core.options.toolbar||[],s={},t=r=>{if(!s[r]){const o=document.createElement("div");o.className="rf-toolbar-group",this.element.appendChild(o),s[r]=o}return s[r]};e.forEach(r=>{switch(r){case"undo":this.addButton(t("history"),"undo","Undo (Ctrl+Z)",'<svg viewBox="0 0 24 24"><path d="M12.5 8c-2.65 0-5.05.99-6.9 2.6L2 7v9h9l-3.62-3.62c1.39-1.16 3.16-1.88 5.12-1.88 3.54 0 6.55 2.31 7.6 5.5l2.37-.78C21.08 11.03 17.15 8 12.5 8z"/></svg>',()=>this.core.exec("undo"));break;case"redo":this.addButton(t("history"),"redo","Redo (Ctrl+Y)",'<svg viewBox="0 0 24 24"><path d="M18.4 10.6C16.55 8.99 14.15 8 11.5 8c-4.65 0-8.58 3.03-9.96 7.22L3.9 16c1.05-3.19 4.06-5.5 7.6-5.5 1.96 0 3.73.72 5.12 1.88L13 16h9V7l-3.6 3.6z"/></svg>',()=>this.core.exec("redo"));break;case"heading":this.addHeadingSelect(t("text-format"));break;case"bold":this.addFormatButton(t("style"),"bold","Bold (Ctrl+B)",'<svg viewBox="0 0 24 24"><path d="M15.6 10.79c.92-.67 1.4-1.64 1.4-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.96-1.52 3.96-3.79 0-1.55-.92-2.82-2.4-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z"/></svg>',"bold");break;case"italic":this.addFormatButton(t("style"),"italic","Italic (Ctrl+I)",'<svg viewBox="0 0 24 24"><path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z"/></svg>',"italic");break;case"underline":this.addFormatButton(t("style"),"underline","Underline (Ctrl+U)",'<svg viewBox="0 0 24 24"><path d="M12 17c3.31 0 6-2.69 6-6V3h-2.5v8c0 1.93-1.57 3.5-3.5 3.5S8.5 12.93 8.5 11V3H6v8c0 3.31 2.69 6 6 6zm-7 2v2h14v-2H5z"/></svg>',"underline");break;case"strike":this.addFormatButton(t("style"),"strikeThrough","Strikethrough",'<svg viewBox="0 0 24 24"><path d="M10 19h4v-3h-4v3zM5 4v3h5v3h4V7h5V4H5zM3 14h18v-2H3v2z"/></svg>',"strikeThrough");break;case"textColor":this.addColorPicker(t("colors"),"foreColor","Text Color",'<svg viewBox="0 0 24 24"><path d="M0 20h24v4H0z" fill="currentColor"/><path d="M11 3L5.5 17h2.25l1.12-3h6.25l1.12 3h2.26L13 3h-2zm-1.38 9L12 5.67 14.38 12H9.62z"/></svg>');break;case"highlight":this.addColorPicker(t("colors"),"hiliteColor","Highlight Color",'<svg viewBox="0 0 24 24"><path d="M16.56 8.94L7.62 17.88l-2.12-2.12 8.94-8.94 2.12 2.12zM19 3l-2.5 2.5 2.5 2.5L21.5 5.5 19 3zM3 21h4l9.5-9.5-4-4L3 17v4z"/></svg>');break;case"alignment":this.addButton(t("align"),"justifyLeft","Align Left",'<svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm0-4h12v-2H3v2zm0-4h18v-2H3v2zm0-4h12V7H3v2zm0-6v2h18V3H3z"/></svg>',()=>this.core.exec("justifyLeft")),this.addButton(t("align"),"justifyCenter","Align Center",'<svg viewBox="0 0 24 24"><path d="M7 15v2h10v-2H7zm-4 6h18v-2H3v2zm0-8h18v-2H3v2zm4-6v2h10V7H7zM3 3v2h18V3H3z"/></svg>',()=>this.core.exec("justifyCenter")),this.addButton(t("align"),"justifyRight","Align Right",'<svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm6-4h12v-2H9v2zm-6-4h18v-2H3v2zm6-4h12V7H9v2zm-6-6v2h18V3H3z"/></svg>',()=>this.core.exec("justifyRight"));break;case"bulletList":this.addFormatButton(t("list"),"insertUnorderedList","Bullet List",'<svg viewBox="0 0 24 24"><path d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5 5.5 6.83 5.5 6 4.83 4.5 4 4.5zm0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5 1.5-.68 1.5-1.5-.67-1.5-1.5-1.5zM7 19h14v-2H7v2zm0-6h14v-2H7v2zm0-8v2h14V5H7z"/></svg>',"insertUnorderedList");break;case"numberList":this.addFormatButton(t("list"),"insertOrderedList","Numbered List",'<svg viewBox="0 0 24 24"><path d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z"/></svg>',"insertOrderedList");break;case"link":this.addButton(t("insert"),"link","Insert Link",'<svg viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>',()=>this.core.promptInsertLink());break;case"image":this.addButton(t("insert"),"image","Insert Image",'<svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>',()=>this.core.promptInsertImage());break;case"table":this.addButton(t("insert"),"table","Insert Table",'<svg viewBox="0 0 24 24"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zm-9 5v4H4v-4h7zm2 0h7v4h-7v-4zm-9 9v-4h7v4H4zm9 0v-4h7v4h-7z"/></svg>',()=>this.core.promptInsertTable());break;case"blockquote":this.addFormatButton(t("format"),"blockquote","Blockquote",'<svg viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>',"formatBlock","blockquote");break;case"codeBlock":this.addFormatButton(t("format"),"pre","Code Block",'<svg viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>',"formatBlock","pre");break;case"horizontalRule":this.addButton(t("format"),"hr","Horizontal Rule",'<svg viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2z"/></svg>',()=>this.core.exec("insertHorizontalRule"));break;case"fullscreen":this.addButton(t("tools"),"fullscreen","Toggle Fullscreen",'<svg viewBox="0 0 24 24"><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg>',()=>this.core.toggleFullscreen());break;case"source":this.addButton(t("tools"),"source","HTML Source",'<svg viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>',()=>this.core.toggleSourceView());break}})}addButton(e,s,t,r,o){const l=document.createElement("button");l.type="button",l.className="rf-btn",l.title=t,l.innerHTML=r,l.addEventListener("click",i=>{i.preventDefault(),o()}),e.appendChild(l)}addFormatButton(e,s,t,r,o,l){const i=document.createElement("button");i.type="button",i.className="rf-btn",i.dataset.command=s,i.title=t,i.innerHTML=r,i.addEventListener("click",a=>{a.preventDefault(),this.core.exec(o||s,l)}),e.appendChild(i)}addHeadingSelect(e){const s=document.createElement("select");s.className="rf-select",s.innerHTML=`
      <option value="p">Paragraph</option>
      <option value="h1">Heading 1</option>
      <option value="h2">Heading 2</option>
      <option value="h3">Heading 3</option>
      <option value="h4">Heading 4</option>
    `,s.addEventListener("change",()=>{const t=s.value;this.core.exec("formatBlock",t==="p"?"p":t)}),e.appendChild(s)}addColorPicker(e,s,t,r){const o=document.createElement("label");o.className="rf-btn rf-color-btn",o.title=t,o.innerHTML=`
      ${r}
      <input type="color" value="#4f46e5">
    `;const l=o.querySelector("input");l.addEventListener("change",()=>{this.core.exec(s,l.value)}),e.appendChild(o)}}class y{constructor(){c(this,"overlay",null)}show(e,s,t){this.close(),this.overlay=document.createElement("div"),this.overlay.className="rf-modal-overlay",this.overlay.innerHTML=`
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
            <input type="text" class="rf-input rf-input-url" placeholder="https://7xbasket.com/" value="${e.url||"https://"}" />
          </div>

          <!-- LINK TEXT Field -->
          <div class="rf-field-group">
            <label class="rf-field-label">LINK TEXT</label>
            <input type="text" class="rf-input rf-input-text" placeholder="Supermarket Franchise in India" value="${e.text||""}" />
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
              <input type="checkbox" class="rf-toggle-tab" ${e.openInNewTab?"checked":""} />
              <span class="rf-slider"></span>
            </label>
          </div>

          <!-- LINK RELATIONSHIP (rel attribute) -->
          <div class="rf-field-group">
            <label class="rf-field-label">LINK RELATIONSHIP <span class="rf-label-sub">(rel attribute)</span></label>
            <div class="rf-rel-grid">
              <!-- Do Follow -->
              <label class="rf-rel-card ${e.rel!=="nofollow"?"rf-rel-selected":""}">
                <div class="rf-rel-card-header">
                  <input type="radio" name="rf_rel_option" value="dofollow" ${e.rel!=="nofollow"?"checked":""} />
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
              <label class="rf-rel-card ${e.rel==="nofollow"?"rf-rel-selected":""}">
                <div class="rf-rel-card-header">
                  <input type="radio" name="rf_rel_option" value="nofollow" ${e.rel==="nofollow"?"checked":""} />
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
            ${e.isEditing?`
              <button type="button" class="rf-btn-remove-link">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>
                Remove Link
              </button>
            `:""}
          </div>
          <div class="rf-modal-footer-right">
            <button type="button" class="rf-btn-cancel">Cancel</button>
            <button type="button" class="rf-btn-submit">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              ${e.isEditing?"Update Link":"Insert Link"}
            </button>
          </div>
        </div>
      </div>
    `,document.body.appendChild(this.overlay);const r=this.overlay.querySelector(".rf-input-url"),o=this.overlay.querySelector(".rf-input-text"),l=this.overlay.querySelector(".rf-toggle-tab"),i=this.overlay.querySelector(".rf-modal-close-btn"),a=this.overlay.querySelector(".rf-btn-cancel"),f=this.overlay.querySelector(".rf-btn-submit"),g=this.overlay.querySelector(".rf-btn-remove-link"),p=this.overlay.querySelectorAll(".rf-rel-card");setTimeout(()=>{r.focus(),r.value==="https://"&&r.setSelectionRange(r.value.length,r.value.length)},50),p.forEach(u=>{u.addEventListener("click",()=>{p.forEach(b=>b.classList.remove("rf-rel-selected")),u.classList.add("rf-rel-selected");const d=u.querySelector('input[type="radio"]');d&&(d.checked=!0)})}),this.overlay.addEventListener("click",u=>{u.target===this.overlay&&this.close()}),i.addEventListener("click",()=>this.close()),a.addEventListener("click",()=>this.close()),g&&t&&g.addEventListener("click",()=>{this.close(),t()}),f.addEventListener("click",()=>{var H;const u=r.value.trim();if(!u||u==="https://"){r.style.borderColor="#ef4444",r.focus();return}const d=(H=this.overlay)==null?void 0:H.querySelector('input[name="rf_rel_option"]:checked'),b=(d==null?void 0:d.value)==="nofollow"?"nofollow":"dofollow",C={url:u,text:o.value.trim(),openInNewTab:l.checked,rel:b,isEditing:e.isEditing};this.close(),s(C)})}close(){this.overlay&&this.overlay.parentNode&&(this.overlay.parentNode.removeChild(this.overlay),this.overlay=null)}}class N{constructor(){c(this,"overlay",null);c(this,"selectedFile",null);c(this,"activeTab","upload")}show(e,s,t){this.close(),this.activeTab=e.isEditing?"url":"upload",this.selectedFile=null,this.overlay=document.createElement("div"),this.overlay.className="rf-modal-overlay",this.overlay.innerHTML=`
      <div class="rf-modal-container">
        <!-- Header -->
        <div class="rf-modal-header">
          <div class="rf-modal-header-left">
            <div class="rf-modal-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
              </svg>
            </div>
            <h3 class="rf-modal-title">Insert / Upload Image</h3>
          </div>
          <button type="button" class="rf-modal-close-btn" aria-label="Close">&times;</button>
        </div>

        <!-- Mode Tabs -->
        <div class="rf-modal-tabs">
          <button type="button" class="rf-tab-btn ${this.activeTab==="upload"?"rf-tab-active":""}" data-tab="upload">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
              <polyline points="17 8 12 3 7 8"></polyline>
              <line x1="12" y1="3" x2="12" y2="15"></line>
            </svg>
            Upload File
          </button>
          <button type="button" class="rf-tab-btn ${this.activeTab==="url"?"rf-tab-active":""}" data-tab="url">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
              <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
            </svg>
            Image URL / Path
          </button>
        </div>

        <!-- Body -->
        <div class="rf-modal-body">
          <!-- Tab 1: Upload File -->
          <div class="rf-tab-panel rf-panel-upload" style="display: ${this.activeTab==="upload"?"block":"none"};">
            <div class="rf-dropzone">
              <div class="rf-dropzone-icon">
                <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="#008744" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
              </div>
              <div class="rf-dropzone-text">
                <strong>Drag & drop an image here</strong>, or <button type="button" class="rf-btn-browse-trigger">Browse File</button>
              </div>
              <p class="rf-dropzone-subtext">Supports JPG, PNG, WEBP, GIF, SVG (Max 10MB)</p>
              <input type="file" class="rf-file-input" accept="image/*" style="display: none;" />
            </div>

            <!-- File Selected Preview Container -->
            <div class="rf-file-preview-card" style="display: none;">
              <img class="rf-preview-img" src="" alt="Preview" />
              <div class="rf-preview-details">
                <div class="rf-preview-filename">filename.jpg</div>
                <div class="rf-preview-filesize">0 KB</div>
              </div>
              <button type="button" class="rf-btn-change-file">Change</button>
            </div>
          </div>

          <!-- Tab 2: Image URL / Path -->
          <div class="rf-tab-panel rf-panel-url" style="display: ${this.activeTab==="url"?"block":"none"};">
            <div class="rf-field-group">
              <label class="rf-field-label">IMAGE URL / PATH <span class="rf-required">*</span></label>
              <input type="text" class="rf-input rf-input-image-url" placeholder="https://example.com/image.jpg or /images/photo.png" value="${e.url||""}" />
              <p class="rf-field-hint">Paste a direct web link or relative storage path.</p>
            </div>
          </div>

          <!-- Common Field: Alt Text -->
          <div class="rf-field-group" style="margin-top: 16px;">
            <label class="rf-field-label">ALT TEXT / CAPTION</label>
            <input type="text" class="rf-input rf-input-alt" placeholder="e.g. Product logo banner" value="${e.altText||""}" />
            <p class="rf-field-hint">Alternative description text for accessibility and SEO.</p>
          </div>
        </div>

        <!-- Footer -->
        <div class="rf-modal-footer">
          <div class="rf-modal-footer-left">
            ${e.isEditing?`
              <button type="button" class="rf-btn-remove-image">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>
                Remove Image
              </button>
            `:""}
          </div>
          <div class="rf-modal-footer-right">
            <button type="button" class="rf-btn-cancel">Cancel</button>
            <button type="button" class="rf-btn-submit">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              ${e.isEditing?"Update Image":"Insert Image"}
            </button>
          </div>
        </div>
      </div>
    `,document.body.appendChild(this.overlay);const r=this.overlay.querySelector(".rf-modal-close-btn"),o=this.overlay.querySelector(".rf-btn-cancel"),l=this.overlay.querySelector(".rf-btn-submit"),i=this.overlay.querySelector(".rf-btn-remove-image"),a=this.overlay.querySelectorAll(".rf-tab-btn"),f=this.overlay.querySelector(".rf-panel-upload"),g=this.overlay.querySelector(".rf-panel-url"),p=this.overlay.querySelector(".rf-dropzone"),u=this.overlay.querySelector(".rf-btn-browse-trigger"),d=this.overlay.querySelector(".rf-file-input"),b=this.overlay.querySelector(".rf-file-preview-card"),C=this.overlay.querySelector(".rf-preview-img"),H=this.overlay.querySelector(".rf-preview-filename"),A=this.overlay.querySelector(".rf-preview-filesize"),V=this.overlay.querySelector(".rf-btn-change-file"),w=this.overlay.querySelector(".rf-input-image-url"),q=this.overlay.querySelector(".rf-input-alt");setTimeout(()=>{this.activeTab==="url"&&w.focus()},50),a.forEach(n=>{n.addEventListener("click",()=>{a.forEach(M=>M.classList.remove("rf-tab-active")),n.classList.add("rf-tab-active");const L=n.dataset.tab;this.activeTab=L,L==="upload"?(f.style.display="block",g.style.display="none"):(f.style.display="none",g.style.display="block",w.focus())})});const B=n=>{if(!n.type.startsWith("image/")){alert("Please select a valid image file (JPG, PNG, WEBP, GIF, SVG).");return}this.selectedFile=n;const L=new FileReader;L.onload=M=>{var S;C.src=(S=M.target)==null?void 0:S.result},L.readAsDataURL(n),H.textContent=n.name,A.textContent=`${(n.size/1024).toFixed(1)} KB`,p.style.display="none",b.style.display="flex"};u.addEventListener("click",()=>d.click()),p.addEventListener("click",n=>{n.target!==u&&d.click()}),d.addEventListener("change",()=>{d.files&&d.files[0]&&B(d.files[0])}),p.addEventListener("dragover",n=>{n.preventDefault(),p.classList.add("rf-dropzone-active")}),p.addEventListener("dragleave",()=>{p.classList.remove("rf-dropzone-active")}),p.addEventListener("drop",n=>{n.preventDefault(),p.classList.remove("rf-dropzone-active"),n.dataTransfer&&n.dataTransfer.files&&n.dataTransfer.files[0]&&B(n.dataTransfer.files[0])}),V.addEventListener("click",()=>{this.selectedFile=null,d.value="",b.style.display="none",p.style.display="block"}),this.overlay.addEventListener("click",n=>{n.target===this.overlay&&this.close()}),r.addEventListener("click",()=>this.close()),o.addEventListener("click",()=>this.close()),i&&t&&i.addEventListener("click",()=>{this.close(),t()}),l.addEventListener("click",()=>{if(this.activeTab==="upload"){if(!this.selectedFile&&!e.url){alert("Please select an image file to upload.");return}}else if(!w.value.trim()){w.style.borderColor="#ef4444",w.focus();return}const n={mode:this.activeTab,url:w.value.trim(),altText:q.value.trim(),file:this.selectedFile,isEditing:!!e.isEditing};this.close(),s(n)})}close(){this.overlay&&this.overlay.parentNode&&(this.overlay.parentNode.removeChild(this.overlay),this.overlay=null)}}const F=new Set(["h1","h2","h3","h4","h5","h6","p","div","span","br","hr","strong","b","em","i","u","s","strike","sub","sup","mark","ul","ol","li","blockquote","pre","code","a","img","video","source","iframe","table","thead","tbody","tfoot","tr","th","td"]),I=new Set(["href","src","alt","title","target","rel","width","height","style","class","align","colspan","rowspan","controls","frameborder","allowfullscreen"]);function E(m){if(!m)return"";const s=new DOMParser().parseFromString(m,"text/html");return z(s.body),s.body.innerHTML}function z(m){const e=Array.from(m.childNodes);for(const s of e)if(s.nodeType===Node.ELEMENT_NODE){const t=s,r=t.tagName.toLowerCase();if(!F.has(r))if(["script","style","object","embed","form"].includes(r)){t.remove();continue}else{const l=document.createTextNode(t.textContent||"");t.replaceWith(l);continue}const o=Array.from(t.attributes);for(const l of o){const i=l.name.toLowerCase();if(i.startsWith("on")||!I.has(i)){t.removeAttribute(l.name);continue}if(["href","src"].includes(i)){const a=l.value.trim().toLowerCase();(a.startsWith("javascript:")||a.startsWith("vbscript:"))&&t.removeAttribute(l.name)}}z(t)}}const x=class x{constructor(e,s={}){c(this,"targetElement");c(this,"options");c(this,"wrapperEl");c(this,"toolbar");c(this,"contentEl");c(this,"sourceEl");c(this,"statusbarEl");c(this,"wordCountEl");c(this,"isSourceView",!1);c(this,"isFullscreen",!1);if(typeof e=="string"){const t=document.querySelector(e);if(!t)throw new Error(`RichForge: Target element "${e}" not found.`);this.targetElement=t}else this.targetElement=e;this.options={projectKey:"",height:350,placeholder:"Start writing your content here...",toolbar:x.defaultToolbar,upload:{enabled:!0,endpoint:"/api/v1/upload",maxSizeMb:10},darkMode:!1,theme:"default",...s},this.init()}init(){this.targetElement.style.display="none",this.wrapperEl=document.createElement("div"),this.wrapperEl.className="rf-wrapper",this.options.darkMode&&this.wrapperEl.classList.add("rf-theme-dark"),typeof this.options.theme=="string"?this.wrapperEl.classList.add(`rf-theme-${this.options.theme}`):typeof this.options.theme=="object"&&(this.options.theme.primaryColor&&this.wrapperEl.style.setProperty("--rf-primary",this.options.theme.primaryColor),this.options.theme.borderRadius&&this.wrapperEl.style.setProperty("--rf-radius",this.options.theme.borderRadius)),this.toolbar=new v(this),this.wrapperEl.appendChild(this.toolbar.element),this.contentEl=document.createElement("div"),this.contentEl.className="rf-content",this.contentEl.contentEditable="true",this.options.placeholder&&this.contentEl.setAttribute("placeholder",this.options.placeholder);const e=typeof this.options.height=="number"?`${this.options.height}px`:this.options.height;e&&(this.contentEl.style.minHeight=e);let s="";this.targetElement instanceof HTMLTextAreaElement||this.targetElement instanceof HTMLInputElement?s=this.targetElement.value:s=this.targetElement.innerHTML,this.contentEl.innerHTML=E(s),this.wrapperEl.appendChild(this.contentEl),this.sourceEl=document.createElement("textarea"),this.sourceEl.className="rf-source-textarea",this.sourceEl.style.display="none",e&&(this.sourceEl.style.minHeight=e),this.wrapperEl.appendChild(this.sourceEl),this.statusbarEl=document.createElement("div"),this.statusbarEl.className="rf-statusbar",this.statusbarEl.innerHTML=`
      <div class="rf-statusbar-left">
        <span class="rf-brand-tag">⚡ RichForge</span>
      </div>
      <div class="rf-statusbar-right">
        <span class="rf-word-count">0 words | 0 chars</span>
      </div>
    `,this.wordCountEl=this.statusbarEl.querySelector(".rf-word-count"),this.wrapperEl.appendChild(this.statusbarEl),this.targetElement.parentNode&&this.targetElement.parentNode.insertBefore(this.wrapperEl,this.targetElement.nextSibling),this.bindEvents(),this.updateWordCount(),this.options.onReady&&this.options.onReady(this)}bindEvents(){this.contentEl.addEventListener("input",()=>{this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML())}),this.contentEl.addEventListener("focus",()=>{this.options.onFocus&&this.options.onFocus()}),this.contentEl.addEventListener("blur",()=>{this.options.onBlur&&this.options.onBlur()}),this.contentEl.addEventListener("dragover",e=>e.preventDefault()),this.contentEl.addEventListener("drop",e=>{e.preventDefault(),e.dataTransfer&&e.dataTransfer.files&&e.dataTransfer.files.length>0&&this.handleFileUpload(e.dataTransfer.files[0])}),this.contentEl.addEventListener("paste",e=>{if(e.clipboardData&&e.clipboardData.items){for(const s of Array.from(e.clipboardData.items))if(s.type.indexOf("image")!==-1){const t=s.getAsFile();if(t){e.preventDefault(),this.handleFileUpload(t);break}}}}),this.sourceEl.addEventListener("input",()=>{this.contentEl.innerHTML=E(this.sourceEl.value),this.syncToTarget(),this.options.onChange&&this.options.onChange(this.getHTML())})}exec(e,s=""){this.contentEl.focus(),document.execCommand(e,!1,s),this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML())}syncToTarget(){const e=this.getHTML();this.targetElement instanceof HTMLTextAreaElement||this.targetElement instanceof HTMLInputElement?this.targetElement.value=e:this.targetElement.innerHTML=e}updateWordCount(){const s=(this.contentEl.innerText||"").trim(),t=s?s.split(/\s+/).length:0,r=s.length;this.wordCountEl.textContent=`${t} words | ${r} chars`}getHTML(){return this.isSourceView?E(this.sourceEl.value):E(this.contentEl.innerHTML)}getText(){return this.contentEl.innerText||""}setHTML(e){const s=E(e);this.contentEl.innerHTML=s,this.sourceEl.value=s,this.syncToTarget(),this.updateWordCount()}getData(){return this.getHTML()}setData(e){this.setHTML(e)}focus(){this.isSourceView?this.sourceEl.focus():this.contentEl.focus()}toggleSourceView(){this.isSourceView=!this.isSourceView,this.isSourceView?(this.sourceEl.value=this.getHTML(),this.contentEl.style.display="none",this.sourceEl.style.display="block"):(this.contentEl.innerHTML=E(this.sourceEl.value),this.sourceEl.style.display="none",this.contentEl.style.display="block")}toggleFullscreen(){this.isFullscreen=!this.isFullscreen,this.isFullscreen?this.wrapperEl.classList.add("rf-fullscreen"):this.wrapperEl.classList.remove("rf-fullscreen")}handleFileUpload(e){var r;if(!((r=this.options.upload)!=null&&r.enabled)){alert("Upload feature is disabled for this editor.");return}const s=new FormData;s.append("file",e),s.append("project_key",this.options.projectKey||"");const t=this.options.upload.endpoint||"/api/v1/upload";fetch(t,{method:"POST",body:s,headers:{Accept:"application/json","X-Project-Key":this.options.projectKey||""}}).then(o=>o.json()).then(o=>{if(o.success&&o.data&&o.data.url)e.type.startsWith("image/")?this.exec("insertImage",o.data.url):this.exec("createLink",o.data.url),this.options.onUpload&&this.options.onUpload(o.data);else{const l=o.message||"File upload failed.";this.options.onError?this.options.onError({code:"UPLOAD_FAILED",message:l}):alert(`RichForge Upload Error: ${l}`)}}).catch(o=>{const l="RichForge could not connect to the upload service.";this.options.onError?this.options.onError({code:"NETWORK_ERROR",message:l}):alert(l)})}promptInsertLink(){var l;this.contentEl.focus();let e=null;const s=window.getSelection();let t="";if(s&&s.rangeCount>0){t=s.toString();let i=s.getRangeAt(0).startContainer;for(;i&&i!==this.contentEl;){if(i.nodeName==="A"){e=i;break}i=i.parentNode}}const r={url:e&&e.getAttribute("href")||"",text:e?e.textContent||"":t,openInNewTab:e?e.getAttribute("target")==="_blank":!1,rel:e&&((l=e.getAttribute("rel"))!=null&&l.includes("nofollow"))?"nofollow":"dofollow",isEditing:!!e};new y().show(r,i=>{this.contentEl.focus();const a=[];i.openInNewTab&&a.push("noopener"),i.rel==="nofollow"&&a.push("nofollow");const f=a.join(" "),g=i.openInNewTab?"_blank":null;if(e)e.setAttribute("href",i.url),g?e.setAttribute("target",g):e.removeAttribute("target"),f?e.setAttribute("rel",f):e.removeAttribute("rel"),i.text&&(e.textContent=i.text);else{const p=i.text||t||i.url,u=g?` target="${g}"`:"",d=f?` rel="${f}"`:"",b=`<a href="${i.url}"${u}${d}>${p}</a>`;this.exec("insertHTML",b)}this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML())},()=>{var i;if(e){const a=document.createTextNode(e.textContent||"");(i=e.parentNode)==null||i.replaceChild(a,e),this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML())}})}promptInsertImage(){this.contentEl.focus();let e=null;const s=window.getSelection();if(s&&s.rangeCount>0){let o=s.getRangeAt(0).startContainer;o.nodeType===Node.ELEMENT_NODE&&o.tagName==="IMG"?e=o:o.parentNode&&o.parentNode.tagName==="IMG"&&(e=o.parentNode)}const t={url:e?e.src:"",altText:e&&e.alt||"",isEditing:!!e};new N().show(t,o=>{if(this.contentEl.focus(),o.mode==="upload"&&o.file)if(this.options.upload&&this.options.upload.enabled!==!1)this.handleFileUpload(o.file);else{const l=new FileReader;l.onload=i=>{var f;const a=(f=i.target)==null?void 0:f.result;if(a){if(e)e.src=a,o.altText&&(e.alt=o.altText);else{const g=o.altText?` alt="${o.altText}"`:"";this.exec("insertHTML",`<img src="${a}"${g} />`)}this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML())}},l.readAsDataURL(o.file)}else if(o.url){if(e)e.src=o.url,o.altText?e.alt=o.altText:e.removeAttribute("alt");else{const l=o.altText?` alt="${o.altText}"`:"";this.exec("insertHTML",`<img src="${o.url}"${l} />`)}this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML())}},()=>{e&&e.parentNode&&(e.parentNode.removeChild(e),this.syncToTarget(),this.updateWordCount(),this.options.onChange&&this.options.onChange(this.getHTML()))})}promptInsertTable(){const e=parseInt(prompt("Number of rows:","3")||"0",10),s=parseInt(prompt("Number of columns:","3")||"0",10);if(e>0&&s>0){let t='<table border="1"><tbody>';for(let r=0;r<e;r++){t+="<tr>";for(let o=0;o<s;o++)t+=r===0?"<th>Header</th>":"<td>Cell</td>";t+="</tr>"}t+="</tbody></table>",this.exec("insertHTML",t)}}destroy(){this.wrapperEl&&this.wrapperEl.parentNode&&this.wrapperEl.parentNode.removeChild(this.wrapperEl),this.targetElement.style.display=""}};c(x,"defaultToolbar",["undo","redo","heading","bold","italic","underline","strike","textColor","highlight","alignment","bulletList","numberList","link","image","table","blockquote","codeBlock","horizontalRule","source","fullscreen"]);let T=x;class k{static create(e,s){return new T(e,s)}static init(e,s){return new T(e,s)}}typeof window<"u"&&(window.RichForge=k,window.RichForgeEditor=k),h.RichForge=k,h.RichForgeCore=T,h.default=k,Object.defineProperties(h,{__esModule:{value:!0},[Symbol.toStringTag]:{value:"Module"}})});
