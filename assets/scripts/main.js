!function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/wp-content/themes/spvggbayreuth/assets/",n(n.s=1)}([,function(e,t,n){"use strict";n.r(t);function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var i=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.apiRoute="http://"+window.location.host+"/wp-json/glzr/v0/menu/header",this.mainMenuList=$(".menu__list"),this.mainMenuItem=$(".mega-menu__item"),this.menuToggle=$("#menu-toggle"),this.menuItem=$(".mega-menu__item"),this.menuPrimary=$("#menu-primary")[0],this.mobileMenuBack=$("#menu-back"),this.checkOnMobile(),this.events(),this.currentPrimaryMenu,this.currentSecondaryMenu,this.currentItemNewsBlock,this.currentItem,this.currentTarget,this.currentMenuLevel=0,this.mobileMenuShown=!1,this.previousMobileMenu,this.currentMobileMenu}var t,n,i;return t=e,(n=[{key:"events",value:function(){var e=this;window.addEventListener("resize",this.checkOnMobile),this.checkOnMobile(),this.onMobile&&($(this.menuToggle).on("click",(function(t){console.log(e.onMobile),e.mobileMenuShown?($(".mega-menu__list--show").removeClass("mega-menu__list--show"),document.getElementById("menu-back").style.display="none",e.mobileMenuShown=!1):($("#menu-primary").addClass("mega-menu__list--show"),e.mobileMenuShown=!0),e.menuToggle.children().toggleClass("close")})),$(this.menuItem).on("click",(function(t){document.getElementById("menu-back").style.display="block",e.currentMobileMenu=document.querySelector("[data-menu-parent='"+t.currentTarget.id+"']"),e.previousMobileMenu=t.currentTarget.parentNode,e.currentMobileMenu.classList.add("mega-menu__list--show"),e.previousMobileMenu.classList.remove("mega-menu__list--show")})),$(this.mobileMenuBack).on("click",(function(t){e.currentMobileMenu.classList.remove("mega-menu__list--show"),1==e.currentMobileMenu.getAttribute("data-menu-level")&&(t.currentTarget.style.display="none",e.previousMobileMenu=e.menuPrimary),console.log(e.previousMobileMenu),e.previousMobileMenu.classList.add("mega-menu__list--show"),e.currentMobileMenu=e.previousMobileMenu}))),$("#body-wrapper").on("click",(function(e){$(".mega-menu__list--show").removeClass("mega-menu__list--show"),$(".mega-menu__item--active").removeClass("mega-menu__item--active")})),$(this.menuItem).on("click",(function(t){e.currentTarget=t.currentTarget,e.targetParent=t.currentTarget.parentNode,0==e.targetParent.getAttribute("data-menu-level")?($(".mega-menu__list--show").removeClass("mega-menu__list--show"),$("#"+e.currentSecondaryMenu).removeClass("mega-menu__item--active"),e.targetParent.id!=e.currentPrimaryMenu&&$("#"+e.currentPrimaryMenu).removeClass("mega-menu__item--active"),e.currentTarget.parentNode.after(document.querySelector("[data-menu-parent='"+e.currentTarget.id+"']")),document.querySelector("[data-menu-parent='"+e.currentTarget.id+"']").classList.add("mega-menu__list--show"),e.currentItemNewsBlock=document.querySelector("[data-menu-parent='"+e.currentTarget.id+"']").querySelector('[data-post-type="category"]').id,document.querySelector("[data-menu-parent='"+e.currentTarget.id+"']").after(document.querySelector("[data-menu-parent='"+e.currentItemNewsBlock+"']")),document.querySelector("[data-menu-parent='"+e.currentItemNewsBlock+"']").classList.add("mega-menu__list--show"),e.currentPrimaryMenu=e.currentTarget.id):1==e.targetParent.getAttribute("data-menu-level")&&(e.targetParent.id!=e.currentSecondaryMenu&&($("#"+e.currentSecondaryMenu).removeClass("mega-menu__item--active"),$("[data-menu-parent="+e.currentSecondaryMenu+"]").removeClass("mega-menu__list--show")),e.currentTarget.parentNode.after(document.querySelector("[data-menu-parent='"+e.currentTarget.id+"']")),document.querySelector("[data-menu-parent='"+e.currentTarget.id+"']").classList.add("mega-menu__list--show"),e.currentSecondaryMenu=e.currentTarget.id),e.currentTarget.classList.add("mega-menu__item--active")}))}},{key:"checkOnMobile",value:function(){window.matchMedia("(max-width: ".concat("992px",")")).matches?this.onMobile=!0:this.mobile=!1}}])&&r(t.prototype,n),i&&r(t,i),e}();function a(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var o=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.submitButton=$("#filter-submit"),this.filterForm=$("#filter"),this.posttypeSelector=$("#posttype"),this.orderBySelector=$("#order"),this.dateSelector=$("#date"),this.categoryFilters=$(".post-filter__categories label"),this.filterTimer,this.events()}var t,n,r;return t=e,(n=[{key:"events",value:function(){var e=this;$(this.posttypeSelector.on("change",(function(t){$(e.submitButton).click()}))),$(this.orderBySelector.on("change",(function(t){$(e.submitButton).click()}))),$(this.dateSelector.on("change",(function(t){$(e.submitButton).click()}))),$(this.categoryFilters.on("click",this.applyFilter)),jQuery((function(e){e("#filter").submit((function(){var t=e("#filter");return e.ajax({url:t.attr("action"),data:t.serialize(),type:t.attr("method"),beforeSend:function(n){t.find("button").text("Processing..."),e("#response").html("<div className='spinner'></div>")},success:function(n){t.find("button").text("Apply filter"),e("#response").html(n)}}),!1}))}))}},{key:"applyFilter",value:function(){this.filterTimer=setTimeout((function(){$("#filter-submit").click()}),700)}}])&&a(t.prototype,n),r&&a(t,r),e}();function s(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var u=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.namespace="sp-block-event-list",this.showEventLinksButton=$("."+this.namespace+"__button--show"),this.hideEventLinksButton=$("."+this.namespace+"__button--hide"),this.linksShown=!1,this.currentLinks=null,this.events()}var t,n,r;return t=e,(n=[{key:"events",value:function(){var e=this;this.showEventLinksButton.each((function(t,n){n.addEventListener("click",(function(t){e.linksShown&&e.currentLinks.classList.toggle(e.namespace+"__links--show"),e.currentLinks=t.currentTarget.nextSibling,e.currentLinks.classList.toggle(e.namespace+"__links--show"),e.linksShown=!0}))})),this.hideEventLinksButton.each((function(t,n){n.addEventListener("click",(function(t){e.currentLinks.classList.toggle(e.namespace+"__links--show"),e.currentLinks=null,e.linksShown=!1}))}))}},{key:"showLinks",value:function(){this.linksShown||this.currentLinks.classList.toggle(this.namespace+"__links--show")}}])&&s(t.prototype,n),r&&s(t,r),e}();function c(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var l=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.init()}var t,n,r;return t=e,(n=[{key:"init",value:function(){$(".glzr-post-slider").slick()}}])&&c(t.prototype,n),r&&c(t,r),e}();new i,new o,new u,new l,window.pageYOffset;window.onscroll=function(){var e;e=window.pageYOffset,e},$('.glzr-post-slider [data-slick-index="0"] h2').toggleClass("show"),$(".glzr-post-slider").on("afterChange",(function(e,t,n){var r=$(".glzr-post-slider").slick("slickCurrentSlide");$('[data-slick-index="'+r+'"] h2').toggleClass("show")})),$(".glzr-post-slider").on("beforeChange",(function(e,t,n){var r=$(".glzr-post-slider").slick("slickCurrentSlide");$('[data-slick-index="'+r+'"] h2').toggleClass("show")})),jQuery((function(){})),$('[data-spy="scroll"]').on("activate.bs.scrollspy",(function(){}));window.location.host;$("#body-wrapper").hover((function(){document.getElementsByClassName("header__sub-menu--show")[0]&&($(".menu__item").removeClass("menu__item--active"),$(".header__sub-menu").removeClass("header__sub-menu--show"))})),$(".text-split").each((function(e){$(this).splitLines({tag:"<span>",width:700})})),$((function(){AOS.init({duration:1200,easing:"ease",once:!0})})),$("#menu-toggle").click((function(){$("#main-navigation").toggleClass("header__menu--hide")})),$(document).ready((function(){$(".fupa_widget table").each((function(){$(this).addClass("Test")}))})),$(window).bind("load",(function(){$(".fupa_widget table.liga_tabelle td.tab_team_name a:contains('SpVgg Bayreuth')").parent().parent()[0].classList.add("highlight")})),$("#input-file").change((function(){!function(e){if(e.files&&e.files[0]){var t=new FileReader;t.onload=function(e){$("#input-file-preview").attr("src",e.target.result)},t.readAsDataURL(e.files[0]),console.log()}}(this)})),wp.apiFetch({path:"/wp-json/sportspress/v2/events"}).then((function(e){}))}]);