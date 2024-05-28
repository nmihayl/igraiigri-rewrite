var timer;
function fullScreen() {
  var t = $(window).width(),
    e = $(window).height(),
    i = t - 20,
    n = i - 200 - 26,
    o = (n / gameStartWidth) * gameStartHeight;
  if (o > e - 80)
    var o = e - 80,
      n = (o / gameStartHeight) * gameStartWidth,
      i = n + 200 + 26;
  i < 980 && (i = 980),
    $("#container").width(i + "px"),
    $("#content").width(i - 200 + "px"),
    $("#location").width(i - 200 - 34 + "px"),
    $("#gameBlock").width(i - 200 - 12 + "px"),
    $("#gameHeader").width(i - 200 - 12 + "px"),
    $("#gameExtra").removeClass("onSide"),
    $("#gameHolder").width(n + 10 + "px"),
    $("#gameContent").width(n + "px"),
    $("#gameContent").height(o + "px");
}
function preRoll() {
  finishPreroll();
}
function finishPreroll() {
  $("#gamePreroll").css("display", "none"),
    $("#gameRating").css("display", "block"),
    $("#fullscreen").css("visibility", "visible"),
    leaderboardDistance < 45
      ? ($("#gameRating").css("display", "none"),
        $("#gameHolder").css("margin-bottom", leaderboardDistance + "px"))
      : $("#gameHolder").css("margin-bottom", leaderboardDistance - 45 + "px"),
    gameStartWidth > $("#gameHolder").width() && "yes" == resizeable
      ? ((targetWidth = $("#gameHolder").width() - 10),
        $("#gameHolder").width(targetWidth + 10 + "px"),
        $("#gameContent").width(targetWidth + "px"),
        $("#gameContent").height(
          (targetWidth / gameStartWidth) * gameStartHeight + "px"
        ))
      : ($("#gameHolder").width(gameStartWidth + 10 + "px"),
        $("#gameContent").width(gameStartWidth + "px"),
        $("#gameContent").height(gameStartHeight + "px")),
    $("#gameContent").css("position", "relative"),
    $("#gameContent").css("top", "0"),
    $("#gameContent").css("left", "0"),
    clearTimeout(timer);
}
!(function (t) {
  t.fn.unveil = function (e) {
    var i,
      n,
      o,
      r = t(window),
      a = e || 0,
      s = window.devicePixelRatio > 1 ? "data-src-retina" : "data-src",
      l = this;
    function h() {
      (i = (n = l.filter(function () {
        var e = t(this),
          i = r.scrollTop(),
          n = i + r.height(),
          o = e.offset().top;
        return o + e.height() >= i - a && o <= n + a;
      })).trigger("unveil")),
        (l = l.not(i));
    }
    return (
      this.one("unveil", function () {
        (o = (o = this.getAttribute(s)) || this.getAttribute("data-src")) &&
          this.setAttribute("src", o);
      }),
      r.scroll(h),
      r.resize(h),
      h(),
      this
    );
  };
})(jQuery),
  $(function () {
    $(".listItem a").hover(function () {
      var t = $(this).data("target");
      $("#" + t + " a img").attr(
        "src",
        "/screenshots/90_" + $(this).data("screenshot") + ".jpg"
      );
    }),
      $(".rollover, .rolloverP").hover(
        function () {},
        function () {
          clearTimeout(timer);
        }
      );
  }),
  $(document).ready(function () {
    $("img").unveil(),
      $("#addthis") && "undefined" != typeof addthis && addthis.init();
  }),
  (window.onload = fullScreen()),
  fullScreen();
