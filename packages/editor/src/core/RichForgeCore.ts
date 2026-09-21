/**
 * RichForge Core Engine & SDK Implementation
 */
import { Toolbar } from '../ui/Toolbar';
import { LinkModal, type LinkModalData } from '../ui/LinkModal';
import { ImageModal, type ImageModalData } from '../ui/ImageModal';
import { sanitizeHTML } from '../utils/sanitizer';

export interface RichForgeOptions {
  projectKey?: string;
  height?: number | string;
  placeholder?: string;
  toolbar?: string[];
  upload?: {
    enabled?: boolean;
    endpoint?: string;
    maxSizeMb?: number;
    allowedTypes?: string[];
  };
  darkMode?: boolean;
  theme?: string | { primaryColor?: string; borderRadius?: string };
  onReady?: (editor: RichForgeCore) => void;
  onChange?: (html: string) => void;
  onFocus?: () => void;
  onBlur?: () => void;
  onUpload?: (fileInfo: any) => void;
  onError?: (error: { code: string; message: string }) => void;
}

export class RichForgeCore {
  public targetElement: HTMLElement | HTMLTextAreaElement;
  public options: RichForgeOptions;
  public wrapperEl!: HTMLElement;
  public toolbar!: Toolbar;
  public contentEl!: HTMLElement;
  public sourceEl!: HTMLTextAreaElement;
  public statusbarEl!: HTMLElement;
  public wordCountEl!: HTMLElement;
  public isSourceView: boolean = false;
  public isFullscreen: boolean = false;

  public static defaultToolbar = [
    'undo', 'redo', 'heading', 'bold', 'italic', 'underline', 'strike',
    'textColor', 'highlight', 'alignment', 'bulletList', 'numberList',
    'link', 'image', 'table', 'blockquote', 'codeBlock', 'horizontalRule',
    'source', 'fullscreen'
  ];

  constructor(target: string | HTMLElement | HTMLTextAreaElement, options: RichForgeOptions = {}) {
    if (typeof target === 'string') {
      const el = document.querySelector(target);
      if (!el) {
        throw new Error(`RichForge: Target element "${target}" not found.`);
      }
      this.targetElement = el as HTMLElement;
    } else {
      this.targetElement = target;
    }

    this.options = {
      projectKey: '',
      height: 350,
      placeholder: 'Start writing your content here...',
      toolbar: RichForgeCore.defaultToolbar,
      upload: { enabled: true, endpoint: '/api/v1/upload', maxSizeMb: 10 },
      darkMode: false,
      theme: 'default',
      ...options
    };

    this.init();
  }

  private init() {
    // Hide original target element
    this.targetElement.style.display = 'none';

    // Create main wrapper
    this.wrapperEl = document.createElement('div');
    this.wrapperEl.className = 'rf-wrapper';
    if (this.options.darkMode) {
      this.wrapperEl.classList.add('rf-theme-dark');
    }

    // Apply custom themes or inline styles
    if (typeof this.options.theme === 'string') {
      this.wrapperEl.classList.add(`rf-theme-${this.options.theme}`);
    } else if (typeof this.options.theme === 'object') {
      if (this.options.theme.primaryColor) {
        this.wrapperEl.style.setProperty('--rf-primary', this.options.theme.primaryColor);
      }
      if (this.options.theme.borderRadius) {
        this.wrapperEl.style.setProperty('--rf-radius', this.options.theme.borderRadius);
      }
    }

    // Toolbar
    this.toolbar = new Toolbar(this);
    this.wrapperEl.appendChild(this.toolbar.element);

    // Editable content area
    this.contentEl = document.createElement('div');
    this.contentEl.className = 'rf-content';
    this.contentEl.contentEditable = 'true';
    if (this.options.placeholder) {
      this.contentEl.setAttribute('placeholder', this.options.placeholder);
    }
    const targetHeight = typeof this.options.height === 'number' ? `${this.options.height}px` : this.options.height;
    if (targetHeight) {
      this.contentEl.style.minHeight = targetHeight;
    }

    // Prepopulate content if target element has value or HTML
    let initialValue = '';
    if (this.targetElement instanceof HTMLTextAreaElement || this.targetElement instanceof HTMLInputElement) {
      initialValue = this.targetElement.value;
    } else {
      initialValue = this.targetElement.innerHTML;
    }
    this.contentEl.innerHTML = sanitizeHTML(initialValue);

    this.wrapperEl.appendChild(this.contentEl);

    // Source textarea
    this.sourceEl = document.createElement('textarea');
    this.sourceEl.className = 'rf-source-textarea';
    this.sourceEl.style.display = 'none';
    if (targetHeight) {
      this.sourceEl.style.minHeight = targetHeight;
    }
    this.wrapperEl.appendChild(this.sourceEl);

    // Status bar
    this.statusbarEl = document.createElement('div');
    this.statusbarEl.className = 'rf-statusbar';
    this.statusbarEl.innerHTML = `
      <div class="rf-statusbar-left">
        <span class="rf-brand-tag">⚡ RichForge</span>
      </div>
      <div class="rf-statusbar-right">
        <span class="rf-word-count">0 words | 0 chars</span>
      </div>
    `;
    this.wordCountEl = this.statusbarEl.querySelector('.rf-word-count') as HTMLElement;
    this.wrapperEl.appendChild(this.statusbarEl);

    // Insert wrapper after target element
    if (this.targetElement.parentNode) {
      this.targetElement.parentNode.insertBefore(this.wrapperEl, this.targetElement.nextSibling);
    }

    // Attach Event Listeners
    this.bindEvents();
    this.updateWordCount();

    if (this.options.onReady) {
      this.options.onReady(this);
    }
  }

  private bindEvents() {
    this.contentEl.addEventListener('input', () => {
      this.syncToTarget();
      this.updateWordCount();
      if (this.options.onChange) {
        this.options.onChange(this.getHTML());
      }
    });

    this.contentEl.addEventListener('focus', () => {
      if (this.options.onFocus) this.options.onFocus();
    });

    this.contentEl.addEventListener('blur', () => {
      if (this.options.onBlur) this.options.onBlur();
    });

    // Drag and drop image/file handler
    this.contentEl.addEventListener('dragover', (e) => e.preventDefault());
    this.contentEl.addEventListener('drop', (e) => {
      e.preventDefault();
      if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length > 0) {
        this.handleFileUpload(e.dataTransfer.files[0]);
      }
    });

    // Clipboard paste image handler
    this.contentEl.addEventListener('paste', (e) => {
      if (e.clipboardData && e.clipboardData.items) {
        for (const item of Array.from(e.clipboardData.items)) {
          if (item.type.indexOf('image') !== -1) {
            const file = item.getAsFile();
            if (file) {
              e.preventDefault();
              this.handleFileUpload(file);
              break;
            }
          }
        }
      }
    });

    this.sourceEl.addEventListener('input', () => {
      this.contentEl.innerHTML = sanitizeHTML(this.sourceEl.value);
      this.syncToTarget();
      if (this.options.onChange) {
        this.options.onChange(this.getHTML());
      }
    });
  }

  public exec(command: string, value: string = '') {
    this.contentEl.focus();
    document.execCommand(command, false, value);
    this.syncToTarget();
    this.updateWordCount();
    if (this.options.onChange) {
      this.options.onChange(this.getHTML());
    }
  }

  public syncToTarget() {
    const html = this.getHTML();
    if (this.targetElement instanceof HTMLTextAreaElement || this.targetElement instanceof HTMLInputElement) {
      this.targetElement.value = html;
    } else {
      this.targetElement.innerHTML = html;
    }
  }

  public updateWordCount() {
    const text = this.contentEl.innerText || '';
    const cleanText = text.trim();
    const words = cleanText ? cleanText.split(/\s+/).length : 0;
    const chars = cleanText.length;
    this.wordCountEl.textContent = `${words} words | ${chars} chars`;
  }

  public getHTML(): string {
    if (this.isSourceView) {
      return sanitizeHTML(this.sourceEl.value);
    }
    return sanitizeHTML(this.contentEl.innerHTML);
  }

  public getText(): string {
    return this.contentEl.innerText || '';
  }

  public setHTML(html: string) {
    const safeHtml = sanitizeHTML(html);
    this.contentEl.innerHTML = safeHtml;
    this.sourceEl.value = safeHtml;
    this.syncToTarget();
    this.updateWordCount();
  }

  public getData(): string {
    return this.getHTML();
  }

  public setData(html: string) {
    this.setHTML(html);
  }

  public focus() {
    if (this.isSourceView) {
      this.sourceEl.focus();
    } else {
      this.contentEl.focus();
    }
  }

  public toggleSourceView() {
    this.isSourceView = !this.isSourceView;
    if (this.isSourceView) {
      this.sourceEl.value = this.getHTML();
      this.contentEl.style.display = 'none';
      this.sourceEl.style.display = 'block';
    } else {
      this.contentEl.innerHTML = sanitizeHTML(this.sourceEl.value);
      this.sourceEl.style.display = 'none';
      this.contentEl.style.display = 'block';
    }
  }

  public toggleFullscreen() {
    this.isFullscreen = !this.isFullscreen;
    if (this.isFullscreen) {
      this.wrapperEl.classList.add('rf-fullscreen');
    } else {
      this.wrapperEl.classList.remove('rf-fullscreen');
    }
  }

  public handleFileUpload(file: File) {
    if (!this.options.upload?.enabled) {
      alert('Upload feature is disabled for this editor.');
      return;
    }

    const formData = new FormData();
    formData.append('file', file);
    formData.append('project_key', this.options.projectKey || '');

    const endpoint = this.options.upload.endpoint || '/api/v1/upload';

    fetch(endpoint, {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json',
        'X-Project-Key': this.options.projectKey || ''
      }
    })
      .then(res => res.json())
      .then(res => {
        if (res.success && res.data && res.data.url) {
          if (file.type.startsWith('image/')) {
            this.exec('insertImage', res.data.url);
          } else {
            this.exec('createLink', res.data.url);
          }
          if (this.options.onUpload) {
            this.options.onUpload(res.data);
          }
        } else {
          const msg = res.message || 'File upload failed.';
          if (this.options.onError) {
            this.options.onError({ code: 'UPLOAD_FAILED', message: msg });
          } else {
            alert(`RichForge Upload Error: ${msg}`);
          }
        }
      })
      .catch(err => {
        const errorMsg = 'RichForge could not connect to the upload service.';
        if (this.options.onError) {
          this.options.onError({ code: 'NETWORK_ERROR', message: errorMsg });
        } else {
          alert(errorMsg);
        }
      });
  }

  public promptInsertLink() {
    this.contentEl.focus();

    let activeAnchor: HTMLAnchorElement | null = null;
    const selection = window.getSelection();
    let selectedText = '';

    if (selection && selection.rangeCount > 0) {
      selectedText = selection.toString();
      let node: Node | null = selection.getRangeAt(0).startContainer;
      while (node && node !== this.contentEl) {
        if (node.nodeName === 'A') {
          activeAnchor = node as HTMLAnchorElement;
          break;
        }
        node = node.parentNode;
      }
    }

    const initialData: LinkModalData = {
      url: activeAnchor ? activeAnchor.getAttribute('href') || '' : '',
      text: activeAnchor ? (activeAnchor.textContent || '') : selectedText,
      openInNewTab: activeAnchor ? activeAnchor.getAttribute('target') === '_blank' : false,
      rel: (activeAnchor && activeAnchor.getAttribute('rel')?.includes('nofollow')) ? 'nofollow' : 'dofollow',
      isEditing: !!activeAnchor
    };

    const modal = new LinkModal();
    modal.show(
      initialData,
      (data: LinkModalData) => {
        this.contentEl.focus();

        const relParts: string[] = [];
        if (data.openInNewTab) relParts.push('noopener');
        if (data.rel === 'nofollow') relParts.push('nofollow');
        const relAttr = relParts.join(' ');
        const targetAttr = data.openInNewTab ? '_blank' : null;

        if (activeAnchor) {
          activeAnchor.setAttribute('href', data.url);
          if (targetAttr) {
            activeAnchor.setAttribute('target', targetAttr);
          } else {
            activeAnchor.removeAttribute('target');
          }
          if (relAttr) {
            activeAnchor.setAttribute('rel', relAttr);
          } else {
            activeAnchor.removeAttribute('rel');
          }
          if (data.text) {
            activeAnchor.textContent = data.text;
          }
        } else {
          const linkText = data.text || selectedText || data.url;
          const targetString = targetAttr ? ` target="${targetAttr}"` : '';
          const relString = relAttr ? ` rel="${relAttr}"` : '';
          const anchorHtml = `<a href="${data.url}"${targetString}${relString}>${linkText}</a>`;
          
          this.exec('insertHTML', anchorHtml);
        }

        this.syncToTarget();
        this.updateWordCount();
        if (this.options.onChange) {
          this.options.onChange(this.getHTML());
        }
      },
      () => {
        if (activeAnchor) {
          const textNode = document.createTextNode(activeAnchor.textContent || '');
          activeAnchor.parentNode?.replaceChild(textNode, activeAnchor);
          this.syncToTarget();
          this.updateWordCount();
          if (this.options.onChange) {
            this.options.onChange(this.getHTML());
          }
        }
      }
    );
  }

  public promptInsertImage() {
    this.contentEl.focus();

    let activeImg: HTMLImageElement | null = null;
    const selection = window.getSelection();
    if (selection && selection.rangeCount > 0) {
      let node: Node | null = selection.getRangeAt(0).startContainer;
      if (node.nodeType === Node.ELEMENT_NODE && (node as HTMLElement).tagName === 'IMG') {
        activeImg = node as HTMLImageElement;
      } else if (node.parentNode && (node.parentNode as HTMLElement).tagName === 'IMG') {
        activeImg = node.parentNode as HTMLImageElement;
      }
    }

    const initialData: Partial<ImageModalData> = {
      url: activeImg ? activeImg.src : '',
      altText: activeImg ? activeImg.alt || '' : '',
      isEditing: !!activeImg
    };

    const modal = new ImageModal();
    modal.show(
      initialData,
      (data: ImageModalData) => {
        this.contentEl.focus();

        if (data.mode === 'upload' && data.file) {
          if (this.options.upload && this.options.upload.enabled !== false) {
            this.handleFileUpload(data.file);
          } else {
            const reader = new FileReader();
            reader.onload = (e) => {
              const src = e.target?.result as string;
              if (src) {
                if (activeImg) {
                  activeImg.src = src;
                  if (data.altText) activeImg.alt = data.altText;
                } else {
                  const altString = data.altText ? ` alt="${data.altText}"` : '';
                  this.exec('insertHTML', `<img src="${src}"${altString} />`);
                }
                this.syncToTarget();
                this.updateWordCount();
                if (this.options.onChange) {
                  this.options.onChange(this.getHTML());
                }
              }
            };
            reader.readAsDataURL(data.file);
          }
        } else if (data.url) {
          if (activeImg) {
            activeImg.src = data.url;
            if (data.altText) activeImg.alt = data.altText;
            else activeImg.removeAttribute('alt');
          } else {
            const altString = data.altText ? ` alt="${data.altText}"` : '';
            this.exec('insertHTML', `<img src="${data.url}"${altString} />`);
          }
          this.syncToTarget();
          this.updateWordCount();
          if (this.options.onChange) {
            this.options.onChange(this.getHTML());
          }
        }
      },
      () => {
        if (activeImg && activeImg.parentNode) {
          activeImg.parentNode.removeChild(activeImg);
          this.syncToTarget();
          this.updateWordCount();
          if (this.options.onChange) {
            this.options.onChange(this.getHTML());
          }
        }
      }
    );
  }

  public promptInsertTable() {
    const rows = parseInt(prompt('Number of rows:', '3') || '0', 10);
    const cols = parseInt(prompt('Number of columns:', '3') || '0', 10);

    if (rows > 0 && cols > 0) {
      let tableHtml = '<table border="1"><tbody>';
      for (let r = 0; r < rows; r++) {
        tableHtml += '<tr>';
        for (let c = 0; c < cols; c++) {
          tableHtml += r === 0 ? '<th>Header</th>' : '<td>Cell</td>';
        }
        tableHtml += '</tr>';
      }
      tableHtml += '</tbody></table>';
      this.exec('insertHTML', tableHtml);
    }
  }

  public destroy() {
    if (this.wrapperEl && this.wrapperEl.parentNode) {
      this.wrapperEl.parentNode.removeChild(this.wrapperEl);
    }
    this.targetElement.style.display = '';
  }
}
