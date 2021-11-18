window.onload = function() {
	wp.blockLibrary.registerCoreBlocks();
	const blocks = wp.blocks.getBlockTypes();
	const disabledBlocks = dgb_object.disabledBlocks;
	const nonce = dgb_object.nonce;

	jQuery( '.block-count' ).text( jQuery( blocks ).size() );

	blocks.sort( function( a, b ) {
		const textA = a.name.toUpperCase();
		const textB = b.name.toUpperCase();
		return ( textA < textB ) ? -1 : ( textA > textB ) ? 1 : 0;
	} );

	var allblocks = '';
	blocks.forEach( function( block ) {
		const id = block.name ? block.name : '';
		const name = block.title ? block.title : '';
		const description = block.description ? block.description : '';
		const category = block.category ? block.category : '';

		//let html = '';
		let html1 = '';

		let isDisabledBlock = false;

		Object.keys( disabledBlocks ).forEach( function( key ) {
			if ( disabledBlocks[ key ] === id ) {
				isDisabledBlock = true;
			}
		} ); 

		
		if(category == 'affiliate-blocks'){
			allblocks += id+',';
			if ( isDisabledBlock ) {
				html1 += '<li class="disabled">';
			}else{
				html1 += '<li>';
			}
			html1 += '<strong>' + name + '</strong>';

			if ( isDisabledBlock ) {
				html1 += '<label class="switch enable"><input type="checkbox"><a class="slider round" href="?page=affiliate_blocks&amp;action=enable&amp;block=' + id + '&amp;_wpnonce=' + nonce + '">' + dgb_strings.disable + '</a></label>';
			} else {
				html1 += '<label class="switch disable"><input type="checkbox" checked><a class="slider round" href="?page=affiliate_blocks&amp;action=disable&amp;block=' + id + '&amp;_wpnonce=' + nonce + '">' + dgb_strings.enable + '</a></label>';
			}
			
			/*if ( isDisabledBlock ) {
				html1 += '<label class="switch enable"><input type="checkbox"><a class="slider round" data-nonce="'+nonce+'" id="'+id+'" onclick="blocksAjaxEnable(this.id)" href="javascript:;">' + dgb_strings.disable + '</a></label>';
			} else {
				html1 += '<label class="switch disable"><input type="checkbox" checked><a class="slider round" data-nonce="'+nonce+'"  id="'+id+'" onclick="blocksAjaxDisable(this.id)" href="javascript:;">' + dgb_strings.enable + '</a></label>';
			}*/

			html1 += '</li>';

		}				
		const ab_enable_disable = jQuery( '#ab_enable_disable' );
		ab_enable_disable.append( html1 );
	} ); 
	jQuery('#allblocks').val(allblocks);
};

/*function blocksAjaxEnable(id){

	var elem = document.getElementById(id);
	var nonce = elem.getAttribute('data-nonce');

	alert(nonce);
	alert(_wpUtilSettings.ajax);
	 
}
function blocksAjaxDisable(id){

	var elem = document.getElementById(id);
	var nonce = elem.getAttribute('data-nonce');
	var currentLocation = window.location;	
	 

    var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		 
	};
	xhttp.open("GET", currentLocation+'&amp;action=enable&block='+id+'&_wpnonce='+nonce+'&_=' + new Date().getTime(), true);	
    xhttp.setRequestHeader('Cache-Control', 'no-cache');
	xhttp.send();

}*/
