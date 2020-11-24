function getParents(el) {
	let parents = [],
		node = el;
	while (node.nodeName !== 'HTML') {
		parents.push(node.parentNode);
		node = node.parentNode;
		//console.log(node);
	}
	return parents;
}
/*

var offset = jQuery('.glacial-sticky-menu').height();
console.log(offset);
var scrollto = offset - 60; // minus fixed header height
console.log(scrollto);
jQuery('html, body').animate({scrollTop:offset}, 0);
*/

