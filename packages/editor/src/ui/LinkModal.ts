/**
 * RichForge Link Modal Component
 */

export interface LinkModalData {
  url: string;
  text: string;
  openInNewTab: boolean;
  rel: 'dofollow' | 'nofollow';
  isEditing: boolean;
}

export class LinkModal {
  private overlay: HTMLElement | null = null;

  public show(
    initialData: LinkModalData,
    onSubmit: (data: LinkModalData) => void,
    onRemove?: () => void
  ) {
    this.close();

    this.overlay = document.createElement('div');
    this.overlay.className = 'rf-modal-overlay';
    this.overlay.innerHTML = `
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
            <input type="text" class="rf-input rf-input-url" placeholder="https://7xbasket.com/" value="${initialData.url || 'https://'}" />
          </div>

          <!-- LINK TEXT Field -->
          <div class="rf-field-group">
            <label class="rf-field-label">LINK TEXT</label>
            <input type="text" class="rf-input rf-input-text" placeholder="Supermarket Franchise in India" value="${initialData.text || ''}" />
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
              <input type="checkbox" class="rf-toggle-tab" ${initialData.openInNewTab ? 'checked' : ''} />
              <span class="rf-slider"></span>
            </label>
          </div>

          <!-- LINK RELATIONSHIP (rel attribute) -->
          <div class="rf-field-group">
            <label class="rf-field-label">LINK RELATIONSHIP <span class="rf-label-sub">(rel attribute)</span></label>
            <div class="rf-rel-grid">
              <!-- Do Follow -->
              <label class="rf-rel-card ${initialData.rel !== 'nofollow' ? 'rf-rel-selected' : ''}">
                <div class="rf-rel-card-header">
                  <input type="radio" name="rf_rel_option" value="dofollow" ${initialData.rel !== 'nofollow' ? 'checked' : ''} />
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
              <label class="rf-rel-card ${initialData.rel === 'nofollow' ? 'rf-rel-selected' : ''}">
                <div class="rf-rel-card-header">
                  <input type="radio" name="rf_rel_option" value="nofollow" ${initialData.rel === 'nofollow' ? 'checked' : ''} />
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
            ${initialData.isEditing ? `
              <button type="button" class="rf-btn-remove-link">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>
                Remove Link
              </button>
            ` : ''}
          </div>
          <div class="rf-modal-footer-right">
            <button type="button" class="rf-btn-cancel">Cancel</button>
            <button type="button" class="rf-btn-submit">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              ${initialData.isEditing ? 'Update Link' : 'Insert Link'}
            </button>
          </div>
        </div>
      </div>
    `;

    document.body.appendChild(this.overlay);

    const urlInput = this.overlay.querySelector('.rf-input-url') as HTMLInputElement;
    const textInput = this.overlay.querySelector('.rf-input-text') as HTMLInputElement;
    const openInNewTabToggle = this.overlay.querySelector('.rf-toggle-tab') as HTMLInputElement;
    const closeBtn = this.overlay.querySelector('.rf-modal-close-btn') as HTMLButtonElement;
    const cancelBtn = this.overlay.querySelector('.rf-btn-cancel') as HTMLButtonElement;
    const submitBtn = this.overlay.querySelector('.rf-btn-submit') as HTMLButtonElement;
    const removeBtn = this.overlay.querySelector('.rf-btn-remove-link') as HTMLButtonElement | null;
    const relCards = this.overlay.querySelectorAll('.rf-rel-card');

    // Auto-focus URL input
    setTimeout(() => {
      urlInput.focus();
      if (urlInput.value === 'https://') {
        urlInput.setSelectionRange(urlInput.value.length, urlInput.value.length);
      }
    }, 50);

    // Rel Card Radio selection behavior
    relCards.forEach((card) => {
      card.addEventListener('click', () => {
        relCards.forEach((c) => c.classList.remove('rf-rel-selected'));
        card.classList.add('rf-rel-selected');
        const radio = card.querySelector('input[type="radio"]') as HTMLInputElement;
        if (radio) radio.checked = true;
      });
    });

    // Close on backdrop click
    this.overlay.addEventListener('click', (e) => {
      if (e.target === this.overlay) {
        this.close();
      }
    });

    closeBtn.addEventListener('click', () => this.close());
    cancelBtn.addEventListener('click', () => this.close());

    if (removeBtn && onRemove) {
      removeBtn.addEventListener('click', () => {
        this.close();
        onRemove();
      });
    }

    submitBtn.addEventListener('click', () => {
      const url = urlInput.value.trim();
      if (!url || url === 'https://') {
        urlInput.style.borderColor = '#ef4444';
        urlInput.focus();
        return;
      }

      const selectedRelRadio = this.overlay?.querySelector('input[name="rf_rel_option"]:checked') as HTMLInputElement;
      const relValue = (selectedRelRadio?.value === 'nofollow' ? 'nofollow' : 'dofollow') as 'dofollow' | 'nofollow';

      const data: LinkModalData = {
        url,
        text: textInput.value.trim(),
        openInNewTab: openInNewTabToggle.checked,
        rel: relValue,
        isEditing: initialData.isEditing
      };

      this.close();
      onSubmit(data);
    });
  }

  public close() {
    if (this.overlay && this.overlay.parentNode) {
      this.overlay.parentNode.removeChild(this.overlay);
      this.overlay = null;
    }
  }
}
