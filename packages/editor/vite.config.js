import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  build: {
    lib: {
      entry: path.resolve(__dirname, 'src/index.ts'),
      name: 'RichForge',
      fileName: (format) => {
        if (format === 'umd') return 'richforge.js';
        if (format === 'es') return 'richforge.es.js';
        return `richforge.${format}.js`;
      },
      formats: ['umd', 'es', 'cjs']
    },
    cssCodeSplit: false,
    outDir: 'dist',
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name === 'style.css') return 'richforge.css';
          return assetInfo.name;
        }
      }
    }
  }
});
