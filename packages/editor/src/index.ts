/**
 * RichForge JavaScript SDK Entry Point
 */
import { RichForgeCore, type RichForgeOptions } from './core/RichForgeCore';
import './themes/richforge.css';

export class RichForge {
  public static create(
    target: string | HTMLElement | HTMLTextAreaElement,
    options?: RichForgeOptions
  ): RichForgeCore {
    return new RichForgeCore(target, options);
  }

  public static init(
    target: string | HTMLElement | HTMLTextAreaElement,
    options?: RichForgeOptions
  ): RichForgeCore {
    return new RichForgeCore(target, options);
  }
}

export { RichForgeCore, type RichForgeOptions };

// Expose on window object for CDN scripts
if (typeof window !== 'undefined') {
  (window as any).RichForge = RichForge;
  (window as any).RichForgeEditor = RichForge;
}

export default RichForge;
