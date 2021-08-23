import MegaMenu from "./modules/MegaMenu";
import PostFilter from "./modules/PostFilter";
import SportspressEventList from "./modules/EventList";

import PostSlider from "./modules/PostSlider";
//
const megaMenu = new MegaMenu();
const postFilter = new PostFilter();
const sportspressEventList = new SportspressEventList();
const postSlider = new PostSlider();

/* -------------------------------------------------------------------------- */
/*                                  On Scroll                                 */
/* -------------------------------------------------------------------------- */

let prevScrollpos = window.pageYOffset;

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  let currentScrollPos = window.pageYOffset;
  if (prevScrollpos < currentScrollPos) {
    // document.getElementsByTagName("HEADER")[0].classList.add("header--shrink");
  } else {
    // document.getElementsByTagName("HEADER")[0].classList.remove("header--shrink");
  }
  prevScrollpos = currentScrollPos;
}


$('.glzr-post-slider [data-slick-index="0"] h2').toggleClass("show");

$('.glzr-post-slider').on('afterChange', function(event, slick, direction){
  const currentSlide = $('.glzr-post-slider').slick('slickCurrentSlide');
  $('[data-slick-index="' + currentSlide + '"] h2').toggleClass("show");
});

$('.glzr-post-slider').on('beforeChange', function(event, slick, direction){
  const currentSlide = $('.glzr-post-slider').slick('slickCurrentSlide');
  $('[data-slick-index="' + currentSlide + '"] h2').toggleClass("show");
});


(function (root, $, undefined) {
  "use strict";

  $(function () {
    // DOM ready, take it away
  });
})(this, jQuery);

/* -------------------------------------------------------------------------- */
/*                                  Scrollspy                                 */
/* -------------------------------------------------------------------------- */

$('[data-spy="scroll"]').on("activate.bs.scrollspy", function () {

});

/* -------------------------------------------------------------------------- */
/*                                   Navbar                                   */
/* -------------------------------------------------------------------------- */

const apiRoute = "http://" + window.location.host + "/wp-json";
/*
$(".menu__item").hover(function () {
  const menuSelector = this.id;

  const menuApiRoute = apiRoute + "/glzr/v0/menu/13";
  const menuJSON = $.getJSON(menuApiRoute);
  document.getElementById("sub-menu").classList.add("header__sub-menu--show");
  $.getJSON(menuApiRoute, function (props) {

    $("#sub-menu").innerHTML(props[menuSelector].title)
  })



  const id = document.getElementById("sub-" + this.id);
  id.classList.add("header__sub-menu--show");
  const activeItem = document.getElementsByClassName("header__sub-menu--show");
  if (activeItem[0]) {
    $(".menu__item").removeClass("menu__item--active");
    this.classList.add("menu__item--active");
    $(".header__sub-menu").removeClass("header__sub-menu--show");
    id.classList.add("header__sub-menu--show");
  }
});

*/

$("#body-wrapper").hover(function () {
  const activeItem = document.getElementsByClassName("header__sub-menu--show");
  if (activeItem[0]) {
    $(".menu__item").removeClass("menu__item--active");
    $(".header__sub-menu").removeClass("header__sub-menu--show");
  }
});

// $(".wp-block-getwid-table-of-contents").insertAfter("#header-wrapper");
// $(".wp-block-getwid-table-of-contents").attr("id", "scrollspy");

/* -------------------------------------------------------------------------- */
/*                                    Slick                                   */
/* -------------------------------------------------------------------------- */

/* ------------------------------- Hero-slider ------------------------------ */

// $(document).ready(function () {
//   $(".hero-slider").slick({
//     settings: "unslick",
//     autoplay: true,
//     speed: 1000,
//     autoplaySpeed: 10000,
//   });
// });


/* -------------------------------------------------------------------------- */
/*                                 Split Lines                                */
/* -------------------------------------------------------------------------- */

$(".text-split").each(function (index) {
  $(this).splitLines({
    tag: "<span>",
    width: 700,
  });
});

/* -------------------------------------------------------------------------- */
/*                               Sportspress API                              */
/* -------------------------------------------------------------------------- */

// function getResults(){
// 	$.getJSON('http://localhost:8888/spvggbayreuth/wp-json/sportspress/v2/events', function (data) {
// 		var game = data[0];
// 			alert(game.title.rendered + '\n' + game.teams[0] + " vs " + game.teams[1] + '\n' + game.main_results[0] + ":" + game.main_results[1])
// 		}
// 	);;
// }

// getResults();

/* -------------------------------------------------------------------------- */
/*                              Animate on Scroll                             */
/* -------------------------------------------------------------------------- */

$(function () {
  AOS.init({
    duration: 1200, // values from 0 to 3000, with step 50ms
    easing: "ease", // default easing for AOS animations
    once: true, // whether animation should happen only once - while scrolling down
  });
});

/* -------------------------------------------------------------------------- */
/*                                 Menu Toggle                                */
/* -------------------------------------------------------------------------- */

$("#menu-toggle").click(function () {
  $("#main-navigation").toggleClass("header__menu--hide");
});

/* -------------------------------------------------------------------------- */
/*                                 FuPa-Widget                                */
/* -------------------------------------------------------------------------- */

$(document).ready(function () {
  $(".fupa_widget table").each(function () {
    $(this).addClass("Test");
  });
});

// $(document).ajaxComplete(function () {

//   const tableHeads = document.querySelector(".top_header_big");
//   console.log(tableHeads);
// });
$(window).bind("load", function () {
  const fupaTable = $(
    ".fupa_widget table.liga_tabelle td.tab_team_name a:contains('SpVgg Bayreuth')"
  )
    .parent()
    .parent()[0]
    .classList.add("highlight");
  // console.log(fupaTable[0]);
  // console.log(tableHeads);
  // code here
});

/* -------------------------------------------------------------------------- */
/*                                    FuPa‡                                   */
/* -------------------------------------------------------------------------- */

// const
// //

/* -------------------------------------------------------------------------- */
/*                                    WPCF7                                   */
/* -------------------------------------------------------------------------- */

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#input-file-preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]); // convert to base64 string
    console.log();
  }
}

$("#input-file").change(function () {
  readURL(this);
});

wp.apiFetch({
  path: "/wp-json/sportspress/v2/events",
}).then((data) => {

});


