/**
 * RichForge Toolbar Component
 */
import { RichForgeCore } from '../core/RichForgeCore';

export class Toolbar {
  private core: RichForgeCore;
  public element: HTMLElement;

  constructor(core: RichForgeCore) {
    this.core = core;
    this.element = document.createElement('div');
    this.element.className = 'rf-toolbar';
    this.render();
  }

  public render() {
    this.element.innerHTML = '';
    const items = this.core.options.toolbar || [];

    const groupMap: { [key: string]: HTMLElement } = {};
    const getGroup = (groupKey: string) => {
      if (!groupMap[groupKey]) {
        const groupEl = document.createElement('div');
        groupEl.className = 'rf-toolbar-group';
        this.element.appendChild(groupEl);
        groupMap[groupKey] = groupEl;
      }
      return groupMap[groupKey];
    };

    items.forEach((item) => {
      switch (item) {
        case 'undo':
          this.addButton(getGroup('history'), 'undo', 'Undo (Ctrl+Z)', `<svg viewBox="0 0 24 24"><path d="M12.5 8c-2.65 0-5.05.99-6.9 2.6L2 7v9h9l-3.62-3.62c1.39-1.16 3.16-1.88 5.12-1.88 3.54 0 6.55 2.31 7.6 5.5l2.37-.78C21.08 11.03 17.15 8 12.5 8z"/></svg>`, () => this.core.exec('undo'));
          break;
        case 'redo':
          this.addButton(getGroup('history'), 'redo', 'Redo (Ctrl+Y)', `<svg viewBox="0 0 24 24"><path d="M18.4 10.6C16.55 8.99 14.15 8 11.5 8c-4.65 0-8.58 3.03-9.96 7.22L3.9 16c1.05-3.19 4.06-5.5 7.6-5.5 1.96 0 3.73.72 5.12 1.88L13 16h9V7l-3.6 3.6z"/></svg>`, () => this.core.exec('redo'));
          break;
        case 'heading':
          this.addHeadingSelect(getGroup('text-format'));
          break;
        case 'bold':
          this.addFormatButton(getGroup('style'), 'bold', 'Bold (Ctrl+B)', `<svg viewBox="0 0 24 24"><path d="M15.6 10.79c.92-.67 1.4-1.64 1.4-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.96-1.52 3.96-3.79 0-1.55-.92-2.82-2.4-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z"/></svg>`, 'bold');
          break;
        case 'italic':
          this.addFormatButton(getGroup('style'), 'italic', 'Italic (Ctrl+I)', `<svg viewBox="0 0 24 24"><path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z"/></svg>`, 'italic');
          break;
        case 'underline':
          this.addFormatButton(getGroup('style'), 'underline', 'Underline (Ctrl+U)', `<svg viewBox="0 0 24 24"><path d="M12 17c3.31 0 6-2.69 6-6V3h-2.5v8c0 1.93-1.57 3.5-3.5 3.5S8.5 12.93 8.5 11V3H6v8c0 3.31 2.69 6 6 6zm-7 2v2h14v-2H5z"/></svg>`, 'underline');
          break;
        case 'strike':
          this.addFormatButton(getGroup('style'), 'strikeThrough', 'Strikethrough', `<svg viewBox="0 0 24 24"><path d="M10 19h4v-3h-4v3zM5 4v3h5v3h4V7h5V4H5zM3 14h18v-2H3v2z"/></svg>`, 'strikeThrough');
          break;
        case 'textColor':
          this.addColorPicker(getGroup('colors'), 'foreColor', 'Text Color', `<svg viewBox="0 0 24 24"><path d="M0 20h24v4H0z" fill="currentColor"/><path d="M11 3L5.5 17h2.25l1.12-3h6.25l1.12 3h2.26L13 3h-2zm-1.38 9L12 5.67 14.38 12H9.62z"/></svg>`);
          break;
        case 'highlight':
          this.addColorPicker(getGroup('colors'), 'hiliteColor', 'Highlight Color', `<svg viewBox="0 0 24 24"><path d="M16.56 8.94L7.62 17.88l-2.12-2.12 8.94-8.94 2.12 2.12zM19 3l-2.5 2.5 2.5 2.5L21.5 5.5 19 3zM3 21h4l9.5-9.5-4-4L3 17v4z"/></svg>`);
          break;
        case 'alignment':
          this.addButton(getGroup('align'), 'justifyLeft', 'Align Left', `<svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm0-4h12v-2H3v2zm0-4h18v-2H3v2zm0-4h12V7H3v2zm0-6v2h18V3H3z"/></svg>`, () => this.core.exec('justifyLeft'));
          this.addButton(getGroup('align'), 'justifyCenter', 'Align Center', `<svg viewBox="0 0 24 24"><path d="M7 15v2h10v-2H7zm-4 6h18v-2H3v2zm0-8h18v-2H3v2zm4-6v2h10V7H7zM3 3v2h18V3H3z"/></svg>`, () => this.core.exec('justifyCenter'));
          this.addButton(getGroup('align'), 'justifyRight', 'Align Right', `<svg viewBox="0 0 24 24"><path d="M3 21h18v-2H3v2zm6-4h12v-2H9v2zm-6-4h18v-2H3v2zm6-4h12V7H9v2zm-6-6v2h18V3H3z"/></svg>`, () => this.core.exec('justifyRight'));
          break;
        case 'bulletList':
          this.addFormatButton(getGroup('list'), 'insertUnorderedList', 'Bullet List', `<svg viewBox="0 0 24 24"><path d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5 5.5 6.83 5.5 6 4.83 4.5 4 4.5zm0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5 1.5-.68 1.5-1.5-.67-1.5-1.5-1.5zM7 19h14v-2H7v2zm0-6h14v-2H7v2zm0-8v2h14V5H7z"/></svg>`, 'insertUnorderedList');
          break;
        case 'numberList':
          this.addFormatButton(getGroup('list'), 'insertOrderedList', 'Numbered List', `<svg viewBox="0 0 24 24"><path d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z"/></svg>`, 'insertOrderedList');
          break;
        case 'link':
          this.addButton(getGroup('insert'), 'link', 'Insert Link', `<svg viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>`, () => this.core.promptInsertLink());
          break;
        case 'image':
          this.addButton(getGroup('insert'), 'image', 'Insert Image', `<svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>`, () => this.core.promptInsertImage());
          break;
        case 'table':
          this.addButton(getGroup('insert'), 'table', 'Insert Table', `<svg viewBox="0 0 24 24"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zm-9 5v4H4v-4h7zm2 0h7v4h-7v-4zm-9 9v-4h7v4H4zm9 0v-4h7v4h-7z"/></svg>`, () => this.core.promptInsertTable());
          break;
        case 'blockquote':
          this.addFormatButton(getGroup('format'), 'blockquote', 'Blockquote', `<svg viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>`, 'formatBlock', 'blockquote');
          break;
        case 'codeBlock':
          this.addFormatButton(getGroup('format'), 'pre', 'Code Block', `<svg viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>`, 'formatBlock', 'pre');
          break;
        case 'horizontalRule':
          this.addButton(getGroup('format'), 'hr', 'Horizontal Rule', `<svg viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2z"/></svg>`, () => this.core.exec('insertHorizontalRule'));
          break;
        case 'fullscreen':
          this.addButton(getGroup('tools'), 'fullscreen', 'Toggle Fullscreen', `<svg viewBox="0 0 24 24"><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg>`, () => this.core.toggleFullscreen());
          break;
        case 'source':
          this.addButton(getGroup('tools'), 'source', 'HTML Source', `<svg viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>`, () => this.core.toggleSourceView());
          break;
      }
    });
  }

  private addButton(container: HTMLElement, command: string, title: string, iconSvg: string, onClick: () => void) {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'rf-btn';
    btn.title = title;
    btn.innerHTML = iconSvg;
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      onClick();
    });
    container.appendChild(btn);
  }

  private addFormatButton(container: HTMLElement, command: string, title: string, iconSvg: string, execCmd?: string, value?: string) {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'rf-btn';
    btn.dataset.command = command;
    btn.title = title;
    btn.innerHTML = iconSvg;
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      this.core.exec(execCmd || command, value);
    });
    container.appendChild(btn);
  }

  private addHeadingSelect(container: HTMLElement) {
    const select = document.createElement('select');
    select.className = 'rf-select';
    select.innerHTML = `
      <option value="p">Paragraph</option>
      <option value="h1">Heading 1</option>
      <option value="h2">Heading 2</option>
      <option value="h3">Heading 3</option>
      <option value="h4">Heading 4</option>
    `;
    select.addEventListener('change', () => {
      const tag = select.value;
      this.core.exec('formatBlock', tag === 'p' ? 'p' : tag);
    });
    container.appendChild(select);
  }

  private addColorPicker(container: HTMLElement, command: string, title: string, iconSvg: string) {
    const btn = document.createElement('label');
    btn.className = 'rf-btn rf-color-btn';
    btn.title = title;
    btn.innerHTML = `
      ${iconSvg}
      <input type="color" value="#4f46e5">
    `;
    const input = btn.querySelector('input') as HTMLInputElement;
    input.addEventListener('change', () => {
      this.core.exec(command, input.value);
    });
    container.appendChild(btn);
  }
}
