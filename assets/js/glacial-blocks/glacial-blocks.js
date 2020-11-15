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
