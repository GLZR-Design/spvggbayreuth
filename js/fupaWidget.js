var fupa_widget_domain = "//www.fupa.net/fupa";
var widget_scripts_loaded = false;
function widget_load_script(c) {
  var a = document.createElement("script");
  a.setAttribute("type", "text/javascript");
  a.setAttribute("src", c);
  var b = document.head;
  if (b == null) {
    b = document.getElementsByTagName("head").item(0);
  }
  b.appendChild(a);
  return a;
}
function widget_load_style(b) {
  var a = document.createElement("link");
  a.setAttribute("rel", "stylesheet");
  a.setAttribute("type", "text/css");
  a.setAttribute("href", b);
  var c = document.head;
  if (c == null) {
    c = document.getElementsByTagName("head").item(0);
  }
  c.appendChild(a);
  return a;
}
function widget_load_basic_scripts() {
  if (widget_scripts_loaded) {
    return;
  }
  widget_scripts_loaded = true;
  widget_load_script(fupa_widget_domain + "/ajax.min.js?20");
  widget_load_script(fupa_widget_domain + "/js/live.min.js");
  widget_load_script(fupa_widget_domain + "/js/voting.min.js");
}
var jquery_loader = null;
if (typeof jQuery == "undefined" || typeof $ == "undefined") {
  jquery_loader = widget_load_script(
    fupa_widget_domain + "/js/jquery-1.11.3.min.js"
  );
}
widget_load_style(fupa_widget_domain + "/widget/widget.min.css");
widget_load_style(
  fupa_widget_domain + "/css/font_icons/font_style_with_ressources.min.css"
);
function widget_url_get_facebook_extension() {
  if (window.location.hostname.indexOf(".statictab.com") >= 0) {
    return window.location.pathname;
  }
  return "";
}
function scriptLaden(b) {
  var a = b + widget_url_get_facebook_extension();
  if (jquery_loader != null) {
    jquery_loader.onload = function () {
      widget_load_basic_scripts();
      widget_load_script(a);
      jquery_loader = null;
    };
    jquery_loader.onreadystatechange = function () {
      var c = jquery_loader.readyState;
      if (c === "loaded" || c === "complete") {
        widget_load_basic_scripts();
        jquery_loader = null;
      }
    };
  }
  widget_load_script(a);
}
var fupa_widget_header;
var fupa_widget_navi;
var fupa_widget_navi_start;
var fupa_widget_navi_spieltag;
var fupa_widget_div;
var fupa_widget_module;
var fupa_widget_sonderseite;
var fupa_widget_news_count;
var liveticker_timout = new Array();
var global_mobile_version = false;
function ie_load(b, a) {
  if (b.readyState == "loaded" || b.readyState == "completed") {
    a();
  } else {
    setTimeout(function () {
      ieLoadBugFix(b, a);
    }, 100);
  }
}
function parseSettings(a) {
  if (typeof a !== "object") {
    return {
      hea: fupa_widget_header,
      nav: fupa_widget_navi,
      div: fupa_widget_div,
      mod: fupa_widget_module,
      sta: fupa_widget_navi_start,
      spt: fupa_widget_navi_spieltag,
      son: fupa_widget_sonderseite,
      nec: fupa_widget_news_count,
      act: a,
    };
  }
  return a;
}
function team_widget(c, b) {
  var a = parseSettings(b);
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain +
      "/widget.php?val=" +
      c +
      "&p=start&act=" +
      a.act +
      "&fupa_widget_header=" +
      a.hea +
      "&fupa_widget_navi=" +
      a.nav +
      "&fupa_widget_div=" +
      a.div +
      "&url=" +
      url
  );
}
function team_widget_klick(a, c) {
  var b = parseSettings(c);
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain +
      "/widget.php?val=" +
      a +
      "&p=klick&act=" +
      b.act +
      "&url=" +
      url
  );
}
function liga_widget(b, c) {
  var a = parseSettings(c);
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain +
      "/widget.php?val=" +
      b +
      "&p=liga_start&act=" +
      a.act +
      "&fupa_widget_header=" +
      a.hea +
      "&fupa_widget_navi=" +
      a.nav +
      "&fupa_widget_div=" +
      a.div +
      "&fupa_widget_module=" +
      a.mod +
      "&fupa_widget_start=" +
      a.sta +
      "&fupa_widget_spieltag=" +
      a.spt +
      "&fupa_widget_sonderseite=" +
      a.son +
      "&url=" +
      url
  );
}
function liga_widget_klick(b, c) {
  var a = parseSettings(c);
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain +
      "/widget.php?val=" +
      b +
      "&p=liga_klick&act=" +
      a.act +
      "&url=" +
      url
  );
}
function liga_widget_klick_gruppe(c, d, a) {
  var b = parseSettings(d);
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain +
      "/widget.php?val=" +
      c +
      "&p=liga_klick&act=" +
      b.act +
      "&journee_id=" +
      a +
      "&url=" +
      url
  );
}
function live_widget(a) {
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain + "/widget.php?val=" + a + "&p=live&url=" + url
  );
  setTimeout(function () {
    live_widget_settimeout();
  }, 10000);
}
function kreis_widget(c, b) {
  var a = parseSettings(b);
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain +
      "/widget.php?val=" +
      c +
      "&p=kreis_start&act=" +
      a.act +
      "&fupa_widget_div=" +
      a.div +
      "&fupa_widget_news_count=" +
      a.nec +
      "&url=" +
      url
  );
}
function voting_widget(a) {
  url = decodeURIComponent(window.location.hostname);
  scriptLaden(
    fupa_widget_domain + "/widget.php?val=" + a + "&p=voting&url=" + url
  );
}
function live_widget_settimeout() {
  var a;
  if (document.getElementById("live_match_ids") == null) {
    return;
  }
  a = document.getElementById("live_match_ids").value;
  setTimeout(function () {
    live_update_ergebnisse(a);
  }, 20000);
}
function oeffneFenster(c, a, b, e, d) {
  MeinFenster = window.open(c, "_blank");
  MeinFenster.focus();
}
function newWin(a) {
  var b = window.open(a, "_blank");
  b.focus();
  return false;
}
function newSpieler(a) {
  MeinFenster = window.open(a, "_blank");
  MeinFenster.focus();
  return false;
}
function newSpielbericht(a) {
  MeinFenster = window.open(a, "_blank");
  MeinFenster.focus();
  return false;
}
function liveticker_init(b, d, c, h, e, g) {
  var a = new Date();
  var f = c - a.getTime();
  liveticker_start(b, d, f, h, e, g);
}
function liveticker_start(j, i, f, e, c, h) {
  var l = new Date(parseInt(j) * 1000);
  var b = new Date();
  var k;
  var a = 0;
  if (i != 0) {
    a = i / 60;
  }
  k = b.getTime() - l.getTime() + f;
  if (e == 1) {
    k = c * 60000 - k;
  }
  if (k < 0) {
    k = 0;
  }
  var d = parseInt(k / 60000);
  var g = parseInt((k / 1000) % 60);
  d += a;
  if (g < 10) {
    g = "0" + g;
  }
  if (d < 10) {
    d = "0" + d;
  }
  document.getElementById("liveticker_uhr_sek_" + h).value = g;
  document.getElementById("liveticker_uhr_min_" + h).value = d;
  liveticker_timout[h] = setTimeout(function () {
    liveticker_start(j, i, f, e, c, h);
  }, 1000);
}
function fupa_galerie_slide_next(a) {
  return fupa_galerie_slide_move(a, -100);
}
function fupa_galerie_slide_prev(a) {
  return fupa_galerie_slide_move(a, 100);
}
function fupa_galerie_slide_move(f, e) {
  var b = $(f).parents("div.fupa-galerie-widget");
  var d = $(b).find(".slider.fupa-slider > div");
  if (!$(d).prop("fupa-slide")) {
    $(d).prop("fupa-slide", 0);
  }
  var a = $(d).prop("fupa-slide") + e;
  var c = Math.round($(d).children().length / 3);
  if (a <= 0 && a > -(c * 100)) {
    $(d).prop("fupa-slide", a);
    $(d).css("left", a + "%");
  }
  return false;
}
