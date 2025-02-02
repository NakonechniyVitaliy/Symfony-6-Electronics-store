import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vite.dev/config/
export default defineConfig({
  build: {
    outDir: '../public/frontend',
    emptyOutDir: true, // Очистка перед билдом
    manifest: true,  // Добавляем поддержку manifest.json,
  },
  plugins: [react()],
})
