import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/normalize.css",
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/css/test-vite.css",
        "resources/js/test-vite.js",
        "resources/css/Accueil.css",
        "resources/css/Equipes.css",
        "resources/css/login.css",
        "resources/css/catalogue.css",
        "resources/css/show.css",
      ],
      refresh: true,
    }),
  ],
});
