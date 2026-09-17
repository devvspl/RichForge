/**
 * RichForge HTML Sanitizer
 * Client-side security sanitization for RichForge Editor content
 */

const ALLOWED_TAGS = new Set([
  'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'div', 'span', 'br', 'hr',
  'strong', 'b', 'em', 'i', 'u', 's', 'strike', 'sub', 'sup', 'mark',
  'ul', 'ol', 'li', 'blockquote', 'pre', 'code',
  'a', 'img', 'video', 'source', 'iframe',
  'table', 'thead', 'tbody', 'tfoot', 'tr', 'th', 'td'
]);

const ALLOWED_ATTRS = new Set([
  'href', 'src', 'alt', 'title', 'target', 'rel',
  'width', 'height', 'style', 'class', 'align', 'colspan', 'rowspan',
  'controls', 'frameborder', 'allowfullscreen'
]);

export function sanitizeHTML(dirtyHtml: string): string {
  if (!dirtyHtml) return '';

  const parser = new DOMParser();
  const doc = parser.parseFromString(dirtyHtml, 'text/html');

  cleanNode(doc.body);

  return doc.body.innerHTML;
}

function cleanNode(node: Node) {
  const children = Array.from(node.childNodes);

  for (const child of children) {
    if (child.nodeType === Node.ELEMENT_NODE) {
      const el = child as HTMLElement;
      const tagName = el.tagName.toLowerCase();

      if (!ALLOWED_TAGS.has(tagName)) {
        // Replace unallowed tag with its text content or remove if unsafe
        if (['script', 'style', 'object', 'embed', 'form'].includes(tagName)) {
          el.remove();
          continue;
        } else {
          const text = document.createTextNode(el.textContent || '');
          el.replaceWith(text);
          continue;
        }
      }

      // Clean attributes
      const attrs = Array.from(el.attributes);
      for (const attr of attrs) {
        const attrName = attr.name.toLowerCase();
        
        // Remove event handlers like onerror, onclick, onload
        if (attrName.startsWith('on') || !ALLOWED_ATTRS.has(attrName)) {
          el.removeAttribute(attr.name);
          continue;
        }

        // Clean javascript: and data: URLs (except images)
        if (['href', 'src'].includes(attrName)) {
          const val = attr.value.trim().toLowerCase();
          if (val.startsWith('javascript:') || val.startsWith('vbscript:')) {
            el.removeAttribute(attr.name);
          }
        }
      }

      // Recursively clean children
      cleanNode(el);
    }
  }
}
