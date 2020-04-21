import * as Prism from "prismjs";
import "prismjs/components/prism-bash";
import "prismjs/components/prism-apacheconf";
import "prismjs/components/prism-shell-session";
// import "prismjs/components/prism-php";
// import "prismjs/components/prism-phpdoc";
import autoloader from "prismjs/plugins/autoloader/prism-autoloader";

import "../../../../../wp-includes/js/wp-embed.js";
import LazyLoad from "./lazy-load.js";
import Track from './track.js';
import toc from "./toc.js";
import "../scss/main.scss";

// 添加一个 tracker
new Track();

document.addEventListener("DOMContentLoaded", () => {
  // lazy load
  new LazyLoad(".post-entry img");

  // hightlight
  Prism.highlightAll();

  // gen TOC
  toc();
});

// const languages = [
//   'bash',
//   'apacheconf',
//   'sass',
//   'scss',
//   'less',
//   'php',
// ];
// 
// window.addEventListener("load", () => {
//   languages.forEach(language => {
//     import(`prismjs/components/prism-${language}`).then(data => {
//       console.log(data);
//     });
//   });
// });
