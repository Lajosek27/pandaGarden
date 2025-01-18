"use strict";(()=>{(self.webpackChunkFalcon_theme=self.webpackChunkFalcon_theme||[]).push([[352],{5352:(W,G,M)=>{M.r(G),M.d(G,{default:()=>U});var z=M(7628),b=M(9482);function U({swiper:e,extendParams:D,on:x,emit:P}){D({virtual:{enabled:!1,slides:[],cache:!0,renderSlide:null,renderExternal:null,renderExternalUpdate:!0,addSlidesBefore:0,addSlidesAfter:0}});let _;const B=(0,z.Me)();e.virtual={cache:{},from:void 0,to:void 0,slides:[],offset:0,slidesGrid:[]};const I=B.createElement("div");function O(l,a){const i=e.params.virtual;if(i.cache&&e.virtual.cache[a])return e.virtual.cache[a];let r;return i.renderSlide?(r=i.renderSlide.call(e,l,a),typeof r=="string"&&(I.innerHTML=r,r=I.children[0])):e.isElement?r=(0,b.az)("swiper-slide"):r=(0,b.az)("div",e.params.slideClass),r.setAttribute("data-swiper-slide-index",a),i.renderSlide||(r.innerHTML=l),i.cache&&(e.virtual.cache[a]=r),r}function u(l){const{slidesPerView:a,slidesPerGroup:i,centeredSlides:r,loop:s}=e.params,{addSlidesBefore:E,addSlidesAfter:g}=e.params.virtual,{from:h,to:v,slides:n,slidesGrid:H,offset:V}=e.virtual;e.params.cssMode||e.updateActiveIndex();const p=e.activeIndex||0;let T;e.rtlTranslate?T="right":T=e.isHorizontal()?"left":"top";let y,f;r?(y=Math.floor(a/2)+i+g,f=Math.floor(a/2)+i+E):(y=a+(i-1)+g,f=(s?a:i)+E);let o=p-f,c=p+y;s||(o=Math.max(o,0),c=Math.min(c,n.length-1));let m=(e.slidesGrid[o]||0)-(e.slidesGrid[0]||0);s&&p>=f?(o-=f,r||(m+=e.slidesGrid[0])):s&&p<f&&(o=-f,r&&(m+=e.slidesGrid[0])),Object.assign(e.virtual,{from:o,to:c,offset:m,slidesGrid:e.slidesGrid,slidesBefore:f,slidesAfter:y});function $(){e.updateSlides(),e.updateProgress(),e.updateSlidesClasses(),P("virtualUpdate")}if(h===o&&v===c&&!l){e.slidesGrid!==H&&m!==V&&e.slides.forEach(t=>{t.style[T]=`${m-Math.abs(e.cssOverflowAdjustment())}px`}),e.updateProgress(),P("virtualUpdate");return}if(e.params.virtual.renderExternal){e.params.virtual.renderExternal.call(e,{offset:m,from:o,to:c,slides:function(){const d=[];for(let A=o;A<=c;A+=1)d.push(n[A]);return d}()}),e.params.virtual.renderExternalUpdate?$():P("virtualUpdate");return}const S=[],C=[],j=t=>{let d=t;return t<0?d=n.length+t:d>=n.length&&(d=d-n.length),d};if(l)e.slidesEl.querySelectorAll(`.${e.params.slideClass}, swiper-slide`).forEach(t=>{t.remove()});else for(let t=h;t<=v;t+=1)if(t<o||t>c){const d=j(t);e.slidesEl.querySelectorAll(`.${e.params.slideClass}[data-swiper-slide-index="${d}"], swiper-slide[data-swiper-slide-index="${d}"]`).forEach(A=>{A.remove()})}const K=s?-n.length:0,N=s?n.length*2:n.length;for(let t=K;t<N;t+=1)if(t>=o&&t<=c){const d=j(t);typeof v=="undefined"||l?C.push(d):(t>v&&C.push(d),t<h&&S.push(d))}if(C.forEach(t=>{e.slidesEl.append(O(n[t],t))}),s)for(let t=S.length-1;t>=0;t-=1){const d=S[t];e.slidesEl.prepend(O(n[d],d))}else S.sort((t,d)=>d-t),S.forEach(t=>{e.slidesEl.prepend(O(n[t],t))});(0,b.gD)(e.slidesEl,".swiper-slide, swiper-slide").forEach(t=>{t.style[T]=`${m-Math.abs(e.cssOverflowAdjustment())}px`}),$()}function L(l){if(typeof l=="object"&&"length"in l)for(let a=0;a<l.length;a+=1)l[a]&&e.virtual.slides.push(l[a]);else e.virtual.slides.push(l);u(!0)}function F(l){const a=e.activeIndex;let i=a+1,r=1;if(Array.isArray(l)){for(let s=0;s<l.length;s+=1)l[s]&&e.virtual.slides.unshift(l[s]);i=a+l.length,r=l.length}else e.virtual.slides.unshift(l);if(e.params.virtual.cache){const s=e.virtual.cache,E={};Object.keys(s).forEach(g=>{const h=s[g],v=h.getAttribute("data-swiper-slide-index");v&&h.setAttribute("data-swiper-slide-index",parseInt(v,10)+r),E[parseInt(g,10)+r]=h}),e.virtual.cache=E}u(!0),e.slideTo(i,0)}function R(l){if(typeof l=="undefined"||l===null)return;let a=e.activeIndex;if(Array.isArray(l))for(let i=l.length-1;i>=0;i-=1)e.virtual.slides.splice(l[i],1),e.params.virtual.cache&&delete e.virtual.cache[l[i]],l[i]<a&&(a-=1),a=Math.max(a,0);else e.virtual.slides.splice(l,1),e.params.virtual.cache&&delete e.virtual.cache[l],l<a&&(a-=1),a=Math.max(a,0);u(!0),e.slideTo(a,0)}function k(){e.virtual.slides=[],e.params.virtual.cache&&(e.virtual.cache={}),u(!0),e.slideTo(0,0)}x("beforeInit",()=>{if(!e.params.virtual.enabled)return;let l;if(typeof e.passedParams.virtual.slides=="undefined"){const a=[...e.slidesEl.children].filter(i=>i.matches(`.${e.params.slideClass}, swiper-slide`));a&&a.length&&(e.virtual.slides=[...a],l=!0,a.forEach((i,r)=>{i.setAttribute("data-swiper-slide-index",r),e.virtual.cache[r]=i,i.remove()}))}l||(e.virtual.slides=e.params.virtual.slides),e.classNames.push(`${e.params.containerModifierClass}virtual`),e.params.watchSlidesProgress=!0,e.originalParams.watchSlidesProgress=!0,e.params.initialSlide||u()}),x("setTranslate",()=>{e.params.virtual.enabled&&(e.params.cssMode&&!e._immediateVirtual?(clearTimeout(_),_=setTimeout(()=>{u()},100)):u())}),x("init update resize",()=>{e.params.virtual.enabled&&e.params.cssMode&&(0,b.z2)(e.wrapperEl,"--swiper-virtual-size",`${e.virtualSize}px`)}),Object.assign(e.virtual,{appendSlide:L,prependSlide:F,removeSlide:R,removeAllSlides:k,update:u})}}}]);})();
