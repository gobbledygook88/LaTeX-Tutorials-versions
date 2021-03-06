/*
 In-Field Label jQuery Plugin
 http://fuelyourcoding.com/scripts/infield.html

 Copyright (c) 2009 Doug Neiner
 Dual licensed under the MIT and GPL licenses.
 Uses the same license as jQuery, see:
 http://docs.jquery.com/License

*/
(function(d){d.InFieldLabels=function(e,b,f){var a=this;a.$label=d(e);a.label=e;a.$field=d(b);a.field=b;a.$label.data("InFieldLabels",a);a.showing=true;a.init=function(){a.options=d.extend({},d.InFieldLabels.defaultOptions,f);if(a.$field.val()!==""){a.$label.hide();a.showing=false}a.$field.focus(function(){a.fadeOnFocus()}).blur(function(){a.checkForEmpty(true)}).bind("keydown.infieldlabel",function(c){a.hideOnChange(c)}).bind("paste",function(){a.setOpacity(0)}).change(function(){a.checkForEmpty()}).bind("onPropertyChange",
function(){a.checkForEmpty()})};a.fadeOnFocus=function(){a.showing&&a.setOpacity(a.options.fadeOpacity)};a.setOpacity=function(c){a.$label.stop().animate({opacity:c},a.options.fadeDuration);a.showing=c>0};a.checkForEmpty=function(c){if(a.$field.val()===""){a.prepForShow();a.setOpacity(c?1:a.options.fadeOpacity)}else a.setOpacity(0)};a.prepForShow=function(){if(!a.showing){a.$label.css({opacity:0}).show();a.$field.bind("keydown.infieldlabel",function(c){a.hideOnChange(c)})}};a.hideOnChange=function(c){if(!(c.keyCode===
16||c.keyCode===9)){if(a.showing){a.$label.hide();a.showing=false}a.$field.unbind("keydown.infieldlabel")}};a.init()};d.InFieldLabels.defaultOptions={fadeOpacity:0.5,fadeDuration:300};d.fn.inFieldLabels=function(e){return this.each(function(){var b=d(this).attr("for");if(b){b=d("input#"+b+"[type='text'],input#"+b+"[type='search'],input#"+b+"[type='tel'],input#"+b+"[type='url'],input#"+b+"[type='email'],input#"+b+"[type='password'],textarea#"+b);b.length!==0&&new d.InFieldLabels(this,b[0],e)}})}})(jQuery);





/*
 List.js
 http://listjs.com/
 https://github.com/javve/list

*/
(function(f,g){var b=f.document,d=f.navigator,c=f.location,a;function e(j,r,n){var p=this,m,o,l,q,k,i;this.listContainer=b.getElementById(j);this.items=[];this.list=null;this.templateEngines={};this.maxVisibleItemsCount=r.maxVisibleItemsCount||200;o=function(s,u){u.list=u.list||j;u.listClass=u.listClass||"list";u.searchClass=u.searchClass||"search";u.sortClass=u.sortClass||"sort";m=new i(p,u);p.list=a.getByClass(u.listClass,p.listContainer,true);a.addEvent(a.getByClass(u.searchClass,p.listContainer),"keyup",p.search);a.addEvent(a.getByClass(u.sortClass,p.listContainer),"click",p.sort);if(u.valueNames){var v=l.get(),t=u.valueNames;if(u.indexAsync){l.indexAsync(v,t)}else{l.index(v,t)}}if(s!==g){p.add(s)}};l={get:function(){var u=p.list.childNodes,t=[];for(var v=0,s=u.length;v<s;v++){if(u[v].data===g){t.push(u[v])}}return t},index:function(s,u){for(var v=0,t=s.length;v<t;v++){p.items.push(new k(u,s[v]))}},indexAsync:function(s,t){var u=s.splice(0,100);this.index(u,t);if(s.length>0){setTimeout(function(){l.indexAsync(s,t)},10)}}};this.add=function(t,u){var x=[],w=false;if(t[0]===g){t=[t]}for(var v=0,s=t.length;v<s;v++){var y=null;if(t[v] instanceof k){y=t[v];y.reload()}else{w=(p.items.length>p.maxVisibleItemsCount)?true:false;y=new k(t[v],g,w)}if(!w){m.add(y,u)}p.items.push(y);x.push(y)}return x};var h=null;this.addAsync=function(s,t){var u=t?t.count||100:100,v=s.splice(0,u);p.add(v,t);if(s.length>0){setTimeout(function(){p.addAsync(s,t)},10)}};this.remove=function(x,w,t){var v=0;for(var u=0,s=p.items.length;u<s;u++){if(p.items[u].values()[x]==w){m.remove(p.items[u],t);p.items.splice(u,1);s--;v++}}return v};this.get=function(x,v){var w=[];for(var t=0,s=p.items.length;t<s;t++){var u=p.items[t];if(u.values()[x]==v){w.push(u)}}if(w.length==0){return null}else{if(w.length==1){return w[0]}else{return w}}};this.sort=function(w,A){var s=p.items.length,z=null,v=w.target||w.srcElement,u="",y=false;if(v===g){z=w}else{z=a.getAttribute(v,"rel");u=a.getAttribute(v,"sorting");if(u=="asc"){v.setAttribute("sorting","desc");y=false}else{v.setAttribute("sorting","asc");y=true}}if(A){A=A}else{A=function(C,B){return q.alphanum(C.values()[z],B.values()[z],y)}}p.items.sort(A);m.clear();for(var t=0,x=p.items.length;t<x;t++){if(p.maxVisibleItemsCount>t){m.add(p.items[t])}}};q={alphanum:function(u,t,v){if(u===g){u=""}if(t===g){t=""}u=u.toString().replace(/&(lt|gt);/g,function(x,B){return(B=="lt")?"<":">"});u=u.replace(/<\/?[^>]+(>|$)/g,"");t=t.toString().replace(/&(lt|gt);/g,function(x,B){return(B=="lt")?"<":">"});t=t.replace(/<\/?[^>]+(>|$)/g,"");var w=this.chunkify(u);var z=this.chunkify(t);for(var s=0;w[s]&&z[s];s++){if(w[s]!==z[s]){var A=Number(w[s]),y=Number(z[s]);if(v){if(A==w[s]&&y==z[s]){return A-y}else{return(w[s]>z[s])?1:-1}}else{if(A==w[s]&&y==z[s]){return y-A}else{return(w[s]>z[s])?-1:1}}}}return w.length-z.length},chunkify:function(z){var C=[],u=0,B=-1,A=0,w,v;while(w=(v=z.charAt(u++)).charCodeAt(0)){var s=(w==45||w==46||(w>=48&&w<=57));if(s!==A){C[++B]="";A=s}C[B]+=v}return C}};this.search=function(E,u){var A=[],y=E.target||E.srcElement;if(y!==g){E=y.value.toLowerCase()}else{E=E.toLowerCase()}E=E.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&");var t=false;if(u===g){t=true}m.clear();if(E===""){for(var x=0,z=p.items.length;((x<z)&&(x<p.maxVisibleItemsCount));x++){p.items[x].show()}}else{for(var v=0,s=p.items.length;v<s;v++){var D=false,C=p.items[v];if(t){u=C.values()}for(var w in u){if(u.hasOwnProperty(w)){var B=u[w].toString().toLowerCase();if((E!=="")&&(B.search(E)>-1)){D=true}}}if(D){A.push(C)}if(D&&(p.maxVisibleItemsCount>A.length)){C.show()}}}return A};this.filter=function(w){var s=[];for(var u=0,t=p.items.length;u<t;u++){var v=p.items[u];if(w===false||w===g){v.show();s.push(v)}else{if(w(v.values())){s.push(v);v.show()}else{v.hide()}}}return s};this.size=function(){return p.items.length};k=function(t,v,u){var w=this,s={};var x=function(z,B,A){if(B===g){if(A){w.values(z,A)}else{w.values(z)}}else{w.elm=B;var y=m.get(w,z);w.values(y)}};this.values=function(z,A){if(z!==g){for(var y in z){if(z.hasOwnProperty(y)){s[y]=z[y]}}if(A!==true){m.set(w,w.values())}}else{return s}};this.show=function(){m.show(w)};this.hide=function(){m.hide(w)};x(t,v,u)};i=function(t,s){if(s.engine===g){s.engine="standard"}else{s.engine=s.engine.toLowerCase()}return new p.constructor.prototype.templateEngines[s.engine](t,s)};o(n,r)}e.prototype.templateEngines={};e.prototype.templateEngines.standard=function(l,i){var m=a.getByClass(i.listClass,b.getElementById(i.list))[0],k=b.getElementById(i.item),h=this,j={tryItemSourceExists:function(){if(k===null){var p=m.childNodes,o=[];for(var q=0,n=p.length;q<n;q++){if(p[q].data===g){k=p[q];break}}}},created:function(n){if(n.elm===g){h.create(n)}},added:function(n){if(n.elm.parentNode===null){h.add(n)}}};this.get=function(r,p){j.tryItemSourceExists();j.created(r);var o={};for(var q=0,n=p.length;q<n;q++){o[p[q]]=a.getByClass(p[q],r.elm)[0].innerHTML}return o};this.set=function(p,o){j.created(p);for(var n in o){if(o.hasOwnProperty(n)){var q=a.getByClass(n,p.elm,true);if(q){q.innerHTML=o[n]}}}};this.create=function(o){if(o.elm!==g){return}j.tryItemSourceExists();var n=k.cloneNode(true);n.id="";o.elm=n;h.set(o,o.values())};this.add=function(n){j.created(n);m.appendChild(n.elm)};this.remove=function(n){m.removeChild(n.elm)};this.show=function(n){j.created(n);j.added(n);m.appendChild(n.elm)};this.hide=function(n){if(n.elm!==g&&n.elm.parentNode===m){m.removeChild(n.elm)}};this.clear=function(){if(m.hasChildNodes()){while(m.childNodes.length>=1){m.removeChild(m.firstChild)}}}};a={getByClass:(function(){if(b.getElementsByClassName){return function(i,h,j){if(j){return h.getElementsByClassName(i)[0]}else{return h.getElementsByClassName(i)}}}else{return function(o,k,q){var r=[],s="*";if(k==null){k=b}var m=k.getElementsByTagName(s);var h=m.length;var p=new RegExp("(^|\\s)"+o+"(\\s|$)");for(var n=0,l=0;n<h;n++){if(p.test(m[n].className)){if(q){return m[n]}else{r[l]=m[n];l++}}}return r}}})(),addEvent:(function(i,h){if(h.addEventListener){return function(n,m,k){if((n&&!(n instanceof Array)&&!n.length&&!a.isNodeList(n)&&(n.length!==0))||n===i){n.addEventListener(m,k,false)}else{if(n&&n[0]!==g){var j=n.length;for(var l=0;l<j;l++){a.addEvent(n[l],m,k)}}}}}else{if(h.attachEvent){return function(n,m,k){if((n&&!(n instanceof Array)&&!n.length&&!a.isNodeList(n)&&(n.length!==0))||n===i){n.attachEvent("on"+m,function(){return k.call(n,i.event)})}else{if(n&&n[0]!==g){var j=n.length;for(var l=0;l<j;l++){a.addEvent(n[l],m,k)}}}}}}})(this,b),getAttribute:function(n,j){var h=(n.getAttribute&&n.getAttribute(j))||null;if(!h){var k=n.attributes;var m=k.length;for(var l=0;l<m;l++){if(j[l]!==g){if(j[l].nodeName===j){h=j[l].nodeValue}}}}return h},isNodeList:function(i){var h=Object.prototype.toString.call(i);if(typeof i==="object"&&/^\[object (HTMLCollection|NodeList|Object)\]$/.test(h)&&(i.length==0||(typeof node==="object"&&i[0].nodeType>0))){return true}return false}};f.List=e;f.ListJsHelpers=a})(window);







// usage: log('inside coolFunc',this,arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};



// catch all document.write() calls
(function(doc){
  var write = doc.write;
  doc.write = function(q){ 
    log('document.write(): ',arguments); 
    if (/docwriteregexwhitelist/.test(q)) write.apply(doc,arguments);  
  };
})(document);


