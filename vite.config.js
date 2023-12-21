import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/css/Accueil.css','resources/css/Equipes.css','resources/css/login.css','resources/css/catalogue.css','resources/css/show.css','resources/css/create.css','resources/css/profile.css','resources/css/FilmGenre.css','resources/css/edit.css'
      ],
      refresh: true,
    }),
  ],
});
