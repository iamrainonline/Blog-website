// SHOW BLACK SIDEBAR ON SCROLL
$(window).on('scroll', function () {
  if($(window).scrollTop()) {
    $('.menu').addClass('black');
  }
  else {
    $('.menu').removeClass('black');
  }
})

// SHOW SCROLLER  ARRoW BOTTOM RIGHT
$(window).on('scroll', function () {
  if($(window).scrollTop()) {
    $('.scroller').removeClass('hidescroller');
    
  }
  else {
    $('.scroller').addClass('hidescroller');
  }
})

//  Show LOGIN

function loginwide() {
  var x = document.getElementById("login-transition");
  if (x.style.width === "100%") {
    x.style.width="0%";
  } else {
    x.style.width = "100%";
  }
}
// Hide login
function go_back() {
  var y = document.getElementById("login-transition");
    y.style.width="0%";
}

//  Stop sending memory data on Refresh (Contact page)
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}