!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=16)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e){e.exports=JSON.parse('{"name":"fox-blocks/cover-group","category":"layout","attributes":{"align":{"type":"string","default":"wide"}}}')},function(e){e.exports=JSON.parse('{"name":"foxland/contact","category":"layout","attributes":{"align":{"type":"string"}}}')},function(e){e.exports=JSON.parse('{"name":"foxland/latest-posts","category":"layout","attributes":{"align":{"type":"string"}}}')},function(e,t){function n(t){return e.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},n(t)}e.exports=n},function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}e.exports=function(e,t,o){return t&&n(e.prototype,t),o&&n(e,o),e}},function(e,t,n){var o=n(11);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&o(e,t)}},function(e,t,n){var o=n(12),r=n(13);e.exports=function(e,t){return!t||"object"!==o(t)&&"function"!=typeof t?r(e):t}},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}},function(e,t,n){var o;!function(){"use strict";var n={}.hasOwnProperty;function r(){for(var e=[],t=0;t<arguments.length;t++){var o=arguments[t];if(o){var l=typeof o;if("string"===l||"number"===l)e.push(o);else if(Array.isArray(o)&&o.length){var a=r.apply(null,o);a&&e.push(a)}else if("object"===l)for(var c in o)n.call(o,c)&&o[c]&&e.push(c)}}return e.join(" ")}e.exports?(r.default=r,e.exports=r):void 0===(o=function(){return r}.apply(t,[]))||(e.exports=o)}()},function(e,t){function n(t,o){return e.exports=n=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},n(t,o)}e.exports=n},function(e,t){function n(t){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?e.exports=n=function(e){return typeof e}:e.exports=n=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n(t)}e.exports=n},function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}},function(e,t){var n=wp.i18n.__;wp.domReady((function(){wp.blocks.unregisterBlockStyle("core/button","default"),wp.blocks.unregisterBlockStyle("core/button","squared"),wp.blocks.registerBlockStyle("core/button",{name:"default",label:n("Default","foxland"),isDefault:!0}),wp.blocks.registerBlockStyle("core/button",{name:"rounded",label:n("Rounded","foxland")}),wp.blocks.registerBlockStyle("core/button",{name:"underlined",label:n("Underlined","foxland")}),wp.blocks.registerBlockStyle("core/button",{name:"outline-rounded",label:n("Outline rounded","foxland")}),wp.blocks.registerBlockStyle("core/paragraph",{name:"ingress",label:n("Ingress","foxland")}),wp.blocks.registerBlockStyle("core/paragraph",{name:"highlight",label:n("Highlight","foxland")}),wp.blocks.registerBlockStyle("core/group",{name:"diamond",label:n("Diamond","foxland")}),wp.blocks.registerBlockStyle("core/group",{name:"inline",label:n("Inline","foxland")}),wp.blocks.registerBlockStyle("core/heading",{name:"small-font-size",label:n("Small font size","foxland")}),wp.blocks.registerBlockStyle("core/columns",{name:"columns-card",label:n("Cards","foxland")}),wp.blocks.registerBlockStyle("core/image",{name:"image-with-bg",label:n("With background","foxland")})}))},function(e,t){wp.hooks.addFilter("blocks.registerBlockType","foxland/wide-support",(function(e,t){return"core/paragraph"!==t&&"core/heading"!==t?e:lodash.assign({},e,{supports:lodash.assign({},e.supports,{align:["wide"]})})}))},function(e,t,n){"use strict";n.r(t);var o=n(5),r=n.n(o),l=n(6),a=n.n(l),c=n(7),i=n.n(c),s=n(8),u=n.n(s),p=n(4),f=n.n(p),d=n(0),b=wp.components,m=b.Path,g=b.SVG,v=Object(d.createElement)(g,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(d.createElement)(m,{d:"M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"}),Object(d.createElement)(m,{d:"M0 0h24v24H0z",fill:"none"})),y=n(1);function h(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,o=f()(e);if(t){var r=f()(this).constructor;n=Reflect.construct(o,arguments,r)}else n=o.apply(this,arguments);return u()(this,n)}}var w=wp.i18n.__,x=wp.blocks.registerBlockType,k=wp.element.Component,O=wp.blockEditor.InnerBlocks,S=y.name,j=y.category,E=y.attributes,_=[["core/cover"],["core/cover"]],B=["core/cover"],z=function(e){i()(n,e);var t=h(n);function n(){return r()(this,n),t.apply(this,arguments)}return a()(n,[{key:"render",value:function(){this.props.attributes;return Object(d.createElement)("div",{className:"fox-blocks-cover-group"},Object(d.createElement)("div",{className:"fox-blocks-cover-group__wrapper"},Object(d.createElement)(O,{allowedBlocks:B,template:_,templateLock:!1})))}}]),n}(k);x(S,{title:w("Cover Group","fox-blocks-cover-group"),description:w("Add group of images or videos with a text overlay.","fox-blocks-cover-group"),icon:v,keywords:[w("cover","fox-blocks-cover-group"),w("group","fox-blocks-cover-group")],supports:{align:["wide","full"]},attributes:E,category:j,edit:z,save:function(e){return Object(d.createElement)("div",{className:"fox-blocks-cover-group"},Object(d.createElement)("div",{className:"fox-blocks-cover-group__wrapper"},Object(d.createElement)(O.Content,null)))}});var M=wp.components,P=M.Path,N=M.SVG,H=Object(d.createElement)(N,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(d.createElement)(P,{d:"M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"}),Object(d.createElement)(P,{d:"M0 0h24v24H0z",fill:"none"})),R=n(2),V=wp.i18n.__,C=wp.blocks.registerBlockType,T=wp.components.ServerSideRender,L=R.name,F=R.category,A=R.attributes;C(L,{title:V("Contact form","foxland-plugin"),description:V("Contact form outputted.","foxland-plugin"),icon:H,keywords:[V("contact","foxland-plugin"),V("form","foxland-plugin")],supports:{align:["wide"]},attributes:A,category:F,edit:function(e){var t=e.attributes,n=e.className;return Object(d.createElement)("div",{className:n},Object(d.createElement)(T,{block:"foxland/contact",attributes:t}))},save:function(){return null}});var D=wp.components,G=D.Path,I=D.SVG,J=Object(d.createElement)(I,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(d.createElement)(G,{d:"M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"}),Object(d.createElement)(G,{d:"M0 0h24v24H0z",fill:"none"})),W=n(3),q=wp.i18n.__,U=wp.blocks.registerBlockType,Z=wp.components.ServerSideRender,K=W.name,Q=W.category,X=W.attributes;U(K,{title:q("Foxland Latest Posts","foxland-plugin"),description:q("Latest posts.","foxland-plugin"),icon:J,keywords:[q("latest","foxland-plugin"),q("posts","foxland-plugin")],supports:{align:["wide","full"]},attributes:X,category:Q,edit:function(e){var t=e.attributes,n=e.className;e.setAttributes;return Object(d.createElement)("div",{className:n},Object(d.createElement)(Z,{block:"foxland/latest-posts",attributes:t}))},save:function(){return null}});n(14);var Y=n(9),$=n.n(Y),ee=n(10),te=n.n(ee),ne=wp.i18n.__,oe=wp.compose.createHigherOrderComponent,re=wp.element.Fragment,le=wp.blockEditor.InspectorControls,ae=wp.components,ce=ae.PanelBody,ie=ae.RadioControl;function se(e){return oe((function(){return function(t){if(["core/latest-comments","core/latest-posts"].includes(t.name))return Object(d.createElement)(e,t);var n=t.attributes.topMargin,o=[{value:"mt-0",label:ne("Zero","foxland-plugin")},{value:"mt-sm",label:ne("Small","foxland-plugin")},{value:"mt-md",label:ne("Medium (default)","foxland-plugin")},{value:"mt-lg",label:ne("Large","foxland-plugin")},{value:"mt-xl",label:ne("Extra Large","foxland-plugin")}];return Object(d.createElement)(re,null,Object(d.createElement)(e,t),Object(d.createElement)(le,null,Object(d.createElement)(ce,{title:ne("Vertical spacing","foxland-plugin"),initialOpen:!1},Object(d.createElement)(ie,{label:ne("Set block top margin","foxland-plugin"),options:o,selected:n,onChange:function(e){return t.setAttributes({topMargin:e})}}))))}}))(e)}function ue(e,t,n){var o=["core/latest-comments","core/latest-posts"];if(t.name.startsWith("core")&&!o.includes(t.name)){var r=null!==e.props&&void 0!==e.props.className?e.props.className.replace(/mt-[^0-9]{1}/gi,"").trim():e.props.className;e.props.className=te()(r,$()({},n.topMargin,"mt-md"!==n.topMargin))}return e}wp.hooks.addFilter("blocks.registerBlockType","foxland/margin-settings-attributes",(function(e,t){return t.startsWith("core")?(e.attributes&&(e.attributes.topMargin={type:"string",default:"mt-md"}),e):e})),wp.domReady((function(){wp.hooks.addFilter("editor.BlockEdit","foxland/margin-settings",se)})),wp.domReady((function(){wp.hooks.addFilter("blocks.getSaveElement","foxland/save-margin-settings",ue)}));n(15)}]);