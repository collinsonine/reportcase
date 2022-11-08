jQuery(document).ready((function(e){var t=e(".cd-horizontal-timeline");function n(e,t,n){var i=f(e.eventsWrapper),r=Number(e.timelineWrapper.css("width").replace("px",""));"next"==n?l(e,i-r+60,r-t):l(e,i+r-60)}function r(e,t,n){var i=e.eventsContent.find(".selected");if(("next"==n?i.next():i.prev()).length>0){var r=e.eventsWrapper.find(".selected"),l="next"==n?r.parent("li").next("li").children("a"):r.parent("li").prev("li").children("a");s(l,e.fillingLine,t),o(l,e.eventsContent),l.addClass("selected"),r.removeClass("selected"),p(l),a(n,l,e)}}function a(e,t,n){var i=window.getComputedStyle(t.get(0),null),r=Number(i.getPropertyValue("left").replace("px","")),a=Number(n.timelineWrapper.css("width").replace("px","")),s=Number(n.eventsWrapper.css("width").replace("px","")),o=f(n.eventsWrapper);("next"==e&&r>a-o||"prev"==e&&r<-o)&&l(n,a/2-r,a-s)}function l(e,t,n){t=t>0?0:t,d(e.eventsWrapper.get(0),"translateX",(t=void 0!==n&&t<n?n:t)+"px"),0==t?e.timelineNavigation.find(".prev").addClass("inactive"):e.timelineNavigation.find(".prev").removeClass("inactive"),t==n?e.timelineNavigation.find(".next").addClass("inactive"):e.timelineNavigation.find(".next").removeClass("inactive")}function s(e,t,n){var i=window.getComputedStyle(e.get(0),null),r=i.getPropertyValue("left"),a=i.getPropertyValue("width"),l=(r=Number(r.replace("px",""))+Number(a.replace("px",""))/2)/n;d(t.get(0),"scaleX",l)}function o(e,t){var n=e.data("date"),i=t.find(".selected"),r=t.find('[data-date="'+n+'"]'),a=r.height();if(r.index()>i.index())var l="selected enter-right",s="leave-left";else l="selected enter-left",s="leave-right";r.attr("class",l),i.attr("class",s).one("webkitAnimationEnd oanimationend msAnimationEnd animationend",(function(){i.removeClass("leave-right leave-left"),r.removeClass("enter-left enter-right")})),t.css("height",a+"px")}function p(e){e.parent("li").prevAll("li").children("a").addClass("older-event").end().end().nextAll("li").children("a").removeClass("older-event")}function f(e){var t=window.getComputedStyle(e.get(0),null);if((n=t.getPropertyValue("-webkit-transform")||t.getPropertyValue("-moz-transform")||t.getPropertyValue("-ms-transform")||t.getPropertyValue("-o-transform")||t.getPropertyValue("transform")).indexOf("(")>=0)var n,i=(n=(n=(n=n.split("(")[1]).split(")")[0]).split(","))[4];else i=0;return Number(i)}function d(e,t,n){e.style["-webkit-transform"]=t+"("+n+")",e.style["-moz-transform"]=t+"("+n+")",e.style["-ms-transform"]=t+"("+n+")",e.style["-o-transform"]=t+"("+n+")",e.style.transform=t+"("+n+")"}function v(e,t){return Math.round(t-e)}function c(e){for(var t=e.offsetTop,n=e.offsetLeft,i=e.offsetWidth,r=e.offsetHeight;e.offsetParent;)t+=(e=e.offsetParent).offsetTop,n+=e.offsetLeft;return t<window.pageYOffset+window.innerHeight&&n<window.pageXOffset+window.innerWidth&&t+r>window.pageYOffset&&n+i>window.pageXOffset}function u(){return window.getComputedStyle(document.querySelector(".cd-horizontal-timeline"),"::before").getPropertyValue("content").replace(/'/g,"").replace(/"/g,"")}t.length>0&&function(t){t.each((function(){var t,l,f=e(this),d={};d.timelineWrapper=f.find(".events-wrapper"),d.eventsWrapper=d.timelineWrapper.children(".events"),d.fillingLine=d.eventsWrapper.children(".filling-line"),d.timelineEvents=d.eventsWrapper.find("a"),d.timelineDates=(t=d.timelineEvents,l=[],t.each((function(){var t=e(this).data("date").split("T");if(t.length>1)var n=t[0].split("/"),i=t[1].split(":");else t[0].indexOf(":")>=0?(n=["2000","0","0"],i=t[0].split(":")):(n=t[0].split("/"),i=["0","0"]);var r=new Date(n[2],n[1]-1,n[0],i[0],i[1]);l.push(r)})),l),d.eventsMinLapse=function(e){var t=[];for(i=1;i<e.length;i++){var n=v(e[i-1],e[i]);t.push(n)}return Math.min.apply(null,t)}(d.timelineDates),d.timelineNavigation=f.find(".cd-timeline-navigation"),d.eventsContent=f.children(".events-content"),function(e,t){for(i=0;i<e.timelineDates.length;i++){var n=v(e.timelineDates[0],e.timelineDates[i]),r=Math.round(n/e.eventsMinLapse)+2;e.timelineEvents.eq(i).css("left",r*t+"px")}}(d,60);var m=function(e,t){var n=v(e.timelineDates[0],e.timelineDates[e.timelineDates.length-1])/e.eventsMinLapse,i=(n=Math.round(n)+4)*t;return e.eventsWrapper.css("width",i+"px"),s(e.eventsWrapper.find("a.selected"),e.fillingLine,i),a("next",e.eventsWrapper.find("a.selected"),e),i}(d,60);f.addClass("loaded"),d.timelineNavigation.on("click",".next",(function(e){e.preventDefault(),n(d,m,"next")})),d.timelineNavigation.on("click",".prev",(function(e){e.preventDefault(),n(d,m,"prev")})),d.eventsWrapper.on("click","a",(function(t){t.preventDefault(),d.timelineEvents.removeClass("selected"),e(this).addClass("selected"),p(e(this)),s(e(this),d.fillingLine,m),o(e(this),d.eventsContent)})),d.eventsContent.on("swipeleft",(function(){"mobile"==u()&&r(d,m,"next")})),d.eventsContent.on("swiperight",(function(){"mobile"==u()&&r(d,m,"prev")})),e(document).keyup((function(e){"37"==e.which&&c(f.get(0))?r(d,m,"prev"):"39"==e.which&&c(f.get(0))&&r(d,m,"next")}))}))}(t)}));