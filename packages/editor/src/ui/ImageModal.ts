/**
 * RichForge Image Modal Component
 */

export interface ImageModalData {
  mode: 'upload' | 'url';
  url: string;
  altText: string;
  file: File | null;
  isEditing: boolean;
}

export class ImageModal {
  private overlay: HTMLElement | null = null;
  private selectedFile: File | null = null;
  private activeTab: 'upload' | 'url' = 'upload';

  public show(
    initialData: Partial<ImageModalData>,
    onSubmit: (data: ImageModalData) => void,
    onRemove?: () => void
  ) {
    this.close();

    this.activeTab = initialData.isEditing ? 'url' : 'upload';
    this.selectedFile = null;

    this.overlay = document.createElement('div');
    this.overlay.className = 'rf-modal-overlay';
    this.overlay.innerHTML = `
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
          <button type="button" class="rf-tab-btn ${this.activeTab === 'upload' ? 'rf-tab-active' : ''}" data-tab="upload">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
              <polyline points="17 8 12 3 7 8"></polyline>
              <line x1="12" y1="3" x2="12" y2="15"></line>
            </svg>
            Upload File
          </button>
          <button type="button" class="rf-tab-btn ${this.activeTab === 'url' ? 'rf-tab-active' : ''}" data-tab="url">
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
          <div class="rf-tab-panel rf-panel-upload" style="display: ${this.activeTab === 'upload' ? 'block' : 'none'};">
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
          <div class="rf-tab-panel rf-panel-url" style="display: ${this.activeTab === 'url' ? 'block' : 'none'};">
            <div class="rf-field-group">
              <label class="rf-field-label">IMAGE URL / PATH <span class="rf-required">*</span></label>
              <input type="text" class="rf-input rf-input-image-url" placeholder="https://example.com/image.jpg or /images/photo.png" value="${initialData.url || ''}" />
              <p class="rf-field-hint">Paste a direct web link or relative storage path.</p>
            </div>
          </div>

          <!-- Common Field: Alt Text -->
          <div class="rf-field-group" style="margin-top: 16px;">
            <label class="rf-field-label">ALT TEXT / CAPTION</label>
            <input type="text" class="rf-input rf-input-alt" placeholder="e.g. Product logo banner" value="${initialData.altText || ''}" />
            <p class="rf-field-hint">Alternative description text for accessibility and SEO.</p>
          </div>
        </div>

        <!-- Footer -->
        <div class="rf-modal-footer">
          <div class="rf-modal-footer-left">
            ${initialData.isEditing ? `
              <button type="button" class="rf-btn-remove-image">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>
                Remove Image
              </button>
            ` : ''}
          </div>
          <div class="rf-modal-footer-right">
            <button type="button" class="rf-btn-cancel">Cancel</button>
            <button type="button" class="rf-btn-submit">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              ${initialData.isEditing ? 'Update Image' : 'Insert Image'}
            </button>
          </div>
        </div>
      </div>
    `;

    document.body.appendChild(this.overlay);

    // Query Elements
    const closeBtn = this.overlay.querySelector('.rf-modal-close-btn') as HTMLButtonElement;
    const cancelBtn = this.overlay.querySelector('.rf-btn-cancel') as HTMLButtonElement;
    const submitBtn = this.overlay.querySelector('.rf-btn-submit') as HTMLButtonElement;
    const removeBtn = this.overlay.querySelector('.rf-btn-remove-image') as HTMLButtonElement | null;
    const tabBtns = this.overlay.querySelectorAll('.rf-tab-btn');
    const panelUpload = this.overlay.querySelector('.rf-panel-upload') as HTMLElement;
    const panelUrl = this.overlay.querySelector('.rf-panel-url') as HTMLElement;

    const dropzone = this.overlay.querySelector('.rf-dropzone') as HTMLElement;
    const browseBtn = this.overlay.querySelector('.rf-btn-browse-trigger') as HTMLButtonElement;
    const fileInput = this.overlay.querySelector('.rf-file-input') as HTMLInputElement;
    const previewCard = this.overlay.querySelector('.rf-file-preview-card') as HTMLElement;
    const previewImg = this.overlay.querySelector('.rf-preview-img') as HTMLImageElement;
    const previewName = this.overlay.querySelector('.rf-preview-filename') as HTMLElement;
    const previewSize = this.overlay.querySelector('.rf-preview-filesize') as HTMLElement;
    const changeFileBtn = this.overlay.querySelector('.rf-btn-change-file') as HTMLButtonElement;

    const urlInput = this.overlay.querySelector('.rf-input-image-url') as HTMLInputElement;
    const altInput = this.overlay.querySelector('.rf-input-alt') as HTMLInputElement;

    // Focus initial input
    setTimeout(() => {
      if (this.activeTab === 'url') {
        urlInput.focus();
      }
    }, 50);

    // Tab switching
    tabBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        tabBtns.forEach((b) => b.classList.remove('rf-tab-active'));
        btn.classList.add('rf-tab-active');

        const tab = (btn as HTMLElement).dataset.tab as 'upload' | 'url';
        this.activeTab = tab;

        if (tab === 'upload') {
          panelUpload.style.display = 'block';
          panelUrl.style.display = 'none';
        } else {
          panelUpload.style.display = 'none';
          panelUrl.style.display = 'block';
          urlInput.focus();
        }
      });
    });

    // File Selection Logic
    const handleFileSelect = (file: File) => {
      if (!file.type.startsWith('image/')) {
        alert('Please select a valid image file (JPG, PNG, WEBP, GIF, SVG).');
        return;
      }
      this.selectedFile = file;

      // Show preview
      const reader = new FileReader();
      reader.onload = (e) => {
        previewImg.src = e.target?.result as string;
      };
      reader.readAsDataURL(file);

      previewName.textContent = file.name;
      previewSize.textContent = `${(file.size / 1024).toFixed(1)} KB`;

      dropzone.style.display = 'none';
      previewCard.style.display = 'flex';
    };

    browseBtn.addEventListener('click', () => fileInput.click());
    dropzone.addEventListener('click', (e) => {
      if (e.target !== browseBtn) {
        fileInput.click();
      }
    });

    fileInput.addEventListener('change', () => {
      if (fileInput.files && fileInput.files[0]) {
        handleFileSelect(fileInput.files[0]);
      }
    });

    // Drag and drop events
    dropzone.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropzone.classList.add('rf-dropzone-active');
    });

    dropzone.addEventListener('dragleave', () => {
      dropzone.classList.remove('rf-dropzone-active');
    });

    dropzone.addEventListener('drop', (e) => {
      e.preventDefault();
      dropzone.classList.remove('rf-dropzone-active');
      if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0]) {
        handleFileSelect(e.dataTransfer.files[0]);
      }
    });

    changeFileBtn.addEventListener('click', () => {
      this.selectedFile = null;
      fileInput.value = '';
      previewCard.style.display = 'none';
      dropzone.style.display = 'block';
    });

    // Close actions
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

    // Submit handler
    submitBtn.addEventListener('click', () => {
      if (this.activeTab === 'upload') {
        if (!this.selectedFile && !initialData.url) {
          alert('Please select an image file to upload.');
          return;
        }
      } else {
        const urlVal = urlInput.value.trim();
        if (!urlVal) {
          urlInput.style.borderColor = '#ef4444';
          urlInput.focus();
          return;
        }
      }

      const data: ImageModalData = {
        mode: this.activeTab,
        url: urlInput.value.trim(),
        altText: altInput.value.trim(),
        file: this.selectedFile,
        isEditing: !!initialData.isEditing
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
