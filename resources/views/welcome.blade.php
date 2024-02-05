<!doctype html>
<html lang="en" data-critters-container>

<head>
  <meta charset="utf-8">
  <title>Calles más seguras</title>

  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/assets/images/logo-sm.png">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbvyBxmMbFhrzP9Z8moyYr6dCr-pzjhBE"></script>
<style>@import"https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap";:root{--tb-blue:#3762ea;--tb-indigo:#1e1a22;--tb-purple:#8561f9;--tb-pink:#f7649f;--tb-red:#ff6c6c;--tb-orange:#f1963b;--tb-yellow:#f6b749;--tb-green:#2dcb73;--tb-teal:#4ab0c1;--tb-cyan:#438eff;--tb-black:#000;--tb-white:#fff;--tb-gray:#878a99;--tb-gray-dark:#1f242e;--tb-gray-100:#f3f6f9;--tb-gray-200:#eef0f7;--tb-gray-300:#e9ebec;--tb-gray-400:#ced4da;--tb-gray-500:#adb5bd;--tb-gray-600:#878a99;--tb-gray-700:#2b313e;--tb-gray-800:#1f242e;--tb-gray-900:#0f1114;--tb-primary:#3762ea;--tb-secondary:#1e1a22;--tb-success:#2dcb73;--tb-info:#4ab0c1;--tb-warning:#f6b749;--tb-danger:#ff6c6c;--tb-light:#eef0f7;--tb-dark:#0f1114;--tb-primary-rgb:55, 98, 234;--tb-secondary-rgb:30, 26, 34;--tb-success-rgb:45, 203, 115;--tb-info-rgb:74, 176, 193;--tb-warning-rgb:246, 183, 73;--tb-danger-rgb:255, 108, 108;--tb-light-rgb:238, 240, 247;--tb-dark-rgb:15, 17, 20;--tb-primary-text-emphasis:#3258d3;--tb-secondary-text-emphasis:#1b171f;--tb-success-text-emphasis:#29b768;--tb-info-text-emphasis:#439eae;--tb-warning-text-emphasis:#dda542;--tb-danger-text-emphasis:#e66161;--tb-light-text-emphasis:#adb5bd;--tb-dark-text-emphasis:#2b313e;--tb-primary-bg-subtle:#e1e7fc;--tb-secondary-bg-subtle:#ddddde;--tb-success-bg-subtle:#e0f7ea;--tb-info-bg-subtle:#e4f3f6;--tb-warning-bg-subtle:#fef4e4;--tb-danger-bg-subtle:#ffe9e9;--tb-light-bg-subtle:#f9fbfc;--tb-dark-bg-subtle:#e9ebec;--tb-primary-border-subtle:#afc0f7;--tb-secondary-border-subtle:#a5a3a7;--tb-success-border-subtle:#abeac7;--tb-info-border-subtle:#b7dfe6;--tb-warning-border-subtle:#fbe2b6;--tb-danger-border-subtle:#ffc4c4;--tb-light-border-subtle:#e9ebec;--tb-dark-border-subtle:#adb5bd;--tb-white-rgb:255, 255, 255;--tb-black-rgb:0, 0, 0;--tb-font-sans-serif:var(--tb-font-sans-serif);--tb-font-monospace:var(--tb-font-monospace);--tb-gradient:linear-gradient(180deg, rgba(255, 255, 255, .15), rgba(255, 255, 255, 0));--tb-body-font-family:var(--tb-font-sans-serif);--tb-body-font-size:var(--tb-font-base);--tb-body-font-weight:var(--tb-font-weight-normal);--tb-body-line-height:1.5;--tb-body-color:#0f1114;--tb-body-color-rgb:15, 17, 20;--tb-body-bg:#f7f7f7;--tb-body-bg-rgb:247, 247, 247;--tb-emphasis-color:#0f1114;--tb-emphasis-color-rgb:15, 17, 20;--tb-secondary-color:#878a99;--tb-secondary-color-rgb:135, 138, 153;--tb-secondary-bg:#fff;--tb-secondary-bg-rgb:255, 255, 255;--tb-tertiary-color:#adb5bd;--tb-tertiary-color-rgb:173, 181, 189;--tb-tertiary-bg:#f3f6f9;--tb-tertiary-bg-rgb:243, 246, 249;--tb-heading-color:var(--tb-body-color);--tb-link-color:#3762ea;--tb-link-color-rgb:55, 98, 234;--tb-link-decoration:none;--tb-link-hover-color:#2c4ebb;--tb-link-hover-color-rgb:44, 78, 187;--tb-code-color:#f7649f;--tb-highlight-bg:#fdf1db;--tb-border-width:1px;--tb-border-style:solid;--tb-border-color:#dde1ef;--tb-border-color-translucent:#dde1ef;--tb-border-radius:.25rem;--tb-border-radius-sm:.2rem;--tb-border-radius-lg:.3rem;--tb-border-radius-xl:1rem;--tb-border-radius-xxl:2rem;--tb-border-radius-2xl:var(--tb-border-radius-xxl);--tb-border-radius-pill:50rem;--tb-box-shadow:var(--tb-shadow);--tb-box-shadow-sm:var(--tb-shadow-sm);--tb-box-shadow-lg:var(--tb-shadow-lg);--tb-box-shadow-inset:inset 0 1px 2px rgba(0, 0, 0, .075);--tb-focus-ring-width:.25rem;--tb-focus-ring-opacity:.25;--tb-focus-ring-color:rgba(var(--tb-primary), .25);--tb-form-valid-color:var(--tb-success);--tb-form-valid-border-color:var(--tb-success);--tb-form-invalid-color:var(--tb-danger);--tb-form-invalid-border-color:var(--tb-danger)}*,*:before,*:after{box-sizing:border-box}@media (prefers-reduced-motion: no-preference){:root{scroll-behavior:smooth}}body{margin:0;font-family:var(--tb-body-font-family);font-size:var(--tb-body-font-size);font-weight:var(--tb-body-font-weight);line-height:var(--tb-body-line-height);color:var(--tb-body-color);text-align:var(--tb-body-text-align);background-color:var(--tb-body-bg);-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:rgba(0,0,0,0)}:root{--tb-breakpoint-xs:0;--tb-breakpoint-sm:576px;--tb-breakpoint-md:768px;--tb-breakpoint-lg:992px;--tb-breakpoint-xl:1200px;--tb-breakpoint-xxl:1400px}html{position:relative;min-height:100%}@charset "UTF-8"</style><link rel="stylesheet" href="styles.a22a4483fc03b7af.css" media="print" onload="this.media='all'"><noscript><link rel="stylesheet" href="styles.a22a4483fc03b7af.css"></noscript></head>

<body>
  <app-root></app-root>
<script src="runtime.31c6814cbac6357f.js" type="module"></script><script src="polyfills.054475e77c4a27c2.js" type="module"></script><script src="scripts.6010e5efa1964c4f.js" defer></script><script src="main.a3a1d33bc0cf6be6.js" type="module"></script></body>

</html>
