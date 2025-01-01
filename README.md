
## Master Laravel 11 and Vue 3 - Build SPA Application

[Udemy course](https://www.udemy.com/course/master-laravel-6-with-vuejs-fullstack-development)

<p>
Advanced SPAs with Vue, Inertia, Laravel and Tailwind CSS.
</p>

[Laravel] (https://laravel.com/docs/11.x)

[Inertia] (https://inertiajs.com/)

[Vue] (https://vuejs.org/)   (https://v3.ru.vuejs.org/)


[TailwindCSS] (https://tailwindcss.com/)

#### using

[tighten/ziggy]  (https://github.com/tighten/ziggy)

[laravel-debugbar]  (https://github.com/barryvdh/laravel-debugbar)

[laravel-ide-helper] (https://github.com/barryvdh/laravel-ide-helper)


####  my working repo





## ESLINT installing

### Встановлення ESLint та плагіна Vue

```bash
./vendor/bin/sail npm install eslint eslint-plugin-vue --save-dev
./vendor/bin/sail npx eslint --init
```

##### Під час ініціалізації виберіть наступне:

1. Якщо ви хочете перевіряти JavaScript або Vue.
2. Використання модулів ECMAScript (ESM). (import/export)
3. Вкажіть середовище (наприклад, Browser, Node).
4. Виберіть плагіни (наприклад, Vue).
5. Формат збереження конфігурації (рекомендую .js або .json).

### Заміна конфигураційного файлу. eslint.config.js

```js
import vuePlugin from 'eslint-plugin-vue';

export default [
  {
    files: ['**/*.js', '**/*.vue'],
    languageOptions: {
      ecmaVersion: 2020,
      sourceType: 'module',
      globals: {
        browser: true,
        node: true,
      },
    },
    plugins: {
      vue: vuePlugin,
    },
    rules: {
      'vue/multi-word-component-names': 'off',
    },
  },
  vuePlugin.configs.recommended,
];
```

### Налаштування редактору .vscode/settings.json:

```json
{
  "eslint.validate": ["javascript", "javascriptreact", "vue"],
  "editor.codeActionsOnSave": {
    "source.fixAll.eslint": true
  }
}
```

