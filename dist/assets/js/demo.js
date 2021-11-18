( function( $ ) {

	var scroll = true
	var scroll_offset = 30
	var scroll_delay = 200
	var scroll_to_top = false
	var scroll_element = null

	var parseTocSlug = function( slug ) {
		
		// If not have the element then return false!
		if( ! slug ) {
			return slug;
		}

		var parsedSlug = slug.toString().toLowerCase()
			.replace(/&(amp;)/g, '')					 	// Remove &
			.replace(/&(mdash;)/g, '')					 	// Remove long dash
			.replace(/\u2013|\u2014/g, '')				 	// Remove long dash
			.replace(/[&]nbsp[;]/gi, '-')                	// Replace inseccable spaces
			.replace(/\s+/g, '-')                        	// Replace spaces with -
			.replace(/[&\/\\#,^!+()$~%.'":*?<>{}@‘’”“]/g, '')  // Remove special chars
			.replace(/\-\-+/g, '-')                      	// Replace multiple - with single -
			.replace(/^-+/, '')                          	// Trim - from start of text
			.replace(/-+$/, '');                         	// Trim - from end of text

		return decodeURI( encodeURIComponent( parsedSlug ) );
	};


	AFFILIATETOC = {

		init: function() {

			$( document ).delegate( ".affiliate-toc-list a", "click", AFFILIATETOC._scroll )
			$( document ).delegate( ".affiliate-toc-scroll-top", "click", AFFILIATETOC._scrollTop )
			$( document ).delegate( '.affiliate-toc-title-wrap', 'click', AFFILIATETOC._toggleCollapse )
			$( document ).on( "scroll", AFFILIATETOC._showHideScroll  )

		},

		_toggleCollapse: function( e ) {
			if ( $( this ).find( '.affiliate-toc-collapsible-wrap' ).length > 0 ) {
				let $root = $( this ).closest( '.wp-block-affiliate-blocks-ab-tableof-content' )
					const parentElem = $( this ).find('.affiliate-table-of-contents-toggle');
					parentElem.toggleClass('affiliate-toc-collapsed');
		
				if ( $root.hasClass( 'affiliate-toc-collapse' ) ) {
					$root.removeClass( 'affiliate-toc-collapse' );
				} else {
					$root.addClass( 'affiliate-toc-collapse' );
				}
			}
		},

		_showHideScroll: function( e ) {

			if ( null != scroll_element ) {

				if ( jQuery( window ).scrollTop() > 300 ) {
					if ( scroll_to_top ) {
						scroll_element.addClass( "affiliate-toc-show-scroll" )
					} else {
						scroll_element.removeClass( "affiliate-toc-show-scroll" )
					}
				} else {
					scroll_element.removeClass( "affiliate-toc-show-scroll" )
				}
			}
		},

		/**
		 * Smooth To Top.
		 */
		_scrollTop: function( e ) {

			$( "html, body" ).animate( {
				scrollTop: 0
			}, scroll_delay )
		},

		/**
		 * Smooth Scroll.
		 */
		_scroll: function( e ) {

			if ( this.hash !== "" ) {

				var hash = this.hash
				var node = $( this ). closest( '.wp-block-affiliate-blocks-ab-tableof-content' )

				scroll = node.data( 'scroll' )
				scroll_offset = node.data( 'offset' )
				scroll_delay = node.data( 'delay' )

				if ( scroll ) {

					var offset = $( decodeURIComponent( hash ) ).offset()

					if ( "undefined" != typeof offset ) {

						$( "html, body" ).animate( {
							scrollTop: ( offset.top - scroll_offset )
						}, scroll_delay )
					}
				}

			}
		},

		/**
		 * Alter the_content.
		 */
		_run: function( attr, id ) {
			
			var $this_scope = $( id );

			if ( $this_scope.find( '.affiliate-toc-collapsible-wrap' ).length > 0 ) {
				$this_scope.find( '.affiliate-toc-title-wrap' ).addClass( 'affiliate-toc-is-collapsible' );
			}
			
			var $headers = JSON.parse(attr.headerLinks);
			
			var allowed_h_tags = [];

			var new_h_tags = [];

			var arr = $.makeArray( attr.mappedHeaders );

			var abcd = arr[0];
			var xyz = [];
			// console.log(abcd)
			var i;
			for (i = 0; i < 6; i++) {
				// if(abcd['h'+(i+1)] === true) {
				// 	new_h_tags.push('h'+(i+1));
				// }
			}
			// var allowed_h_tags_str = ( null !== allowed_h_tags ) ? allowed_h_tags.join( ',' ) : '';
			// console.log(allowed_h_tags)
			// console.log(allowed_h_tags_str)
			// $.each(abcd, function(k, v) {
			// 	console.log(k, v);
			// });
			// console.log('==========================');
			// console.log('==========================');
			// console.log($.parseJSON(abcd))
				// console.log('==========================');
			// console.log(attr.mappedHeaders)
			// console.log(attr.mappingHeaders)
			// console.log('==========================');
			// abcd.forEach((p_tag, index) => p_tag === true ? console.log(p_tag) : null);
			// Object.keys(abcd).forEach((tags,index) =>{
			
			// });
			
			// console.log(new_h_tags)

			if ( undefined !== attr.mappingHeaders ) {

				attr.mappingHeaders.forEach((h_tag, index) => h_tag === true ? allowed_h_tags.push('h' + (index+1)) : null);
				var allowed_h_tags_str = ( null !== allowed_h_tags ) ? allowed_h_tags.join( ',' ) : '';
			}
			
			

			var all_header = ( undefined !== allowed_h_tags_str && '' !== allowed_h_tags_str ) ? $( 'body' ).find( allowed_h_tags_str ) : $( 'body' ).find('h1, h2, h3, h4, h5, h6' );

			if ( undefined !== $headers && 0 !== all_header.length ) {

				$headers.forEach(function (element, i) {
					
					let element_text = parseTocSlug(element.text);
					all_header.each( function (){

						let header = $( this );
						let header_text = parseTocSlug(header.text());
						if ( element_text.localeCompare(header_text) === 0 ) {
							header.before('<span id="' + header_text + '" class="affiliate-toc-heading-anchor"></span>');
						}
					});
				});
			}

			scroll_to_top = attr.scrollToTop

			scroll_element = $( ".affiliate-toc-scroll-top" )
			if ( 0 == scroll_element.length ) {
				$( "body" ).append( "<div class=\"affiliate-toc-scroll-top dashicons dashicons-arrow-up-alt2\"></div>" )
				scroll_element = $( ".affiliate-toc-scroll-top" )
			}

			if ( scroll_to_top ) {
				scroll_element.addClass( "affiliate-toc-show-scroll" )
			} else {
				scroll_element.removeClass( "affiliate-toc-show-scroll" )
			}

			AFFILIATETOC._showHideScroll()
		},
	}

	$( document ).ready(function() {
		AFFILIATETOC.init()
	})


} )( jQuery )

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++============================================================

( function( $ ) {

	var scroll = true
	var scroll_offset = 30
	var scroll_delay = 200
	var scroll_to_top = false
	var scroll_element = null

	var parseTocSlug = function( slug ) {
		
		// If not have the element then return false!
		if( ! slug ) {
			return slug;
		}

		var parsedSlug = slug.toString().toLowerCase()
			.replace(/&(amp;)/g, '')					 	// Remove &
			.replace(/&(mdash;)/g, '')					 	// Remove long dash
			.replace(/\u2013|\u2014/g, '')				 	// Remove long dash
			.replace(/[&]nbsp[;]/gi, '-')                	// Replace inseccable spaces
			.replace(/\s+/g, '-')                        	// Replace spaces with -
			.replace(/[&\/\\#,^!+()$~%.'":*?<>{}@‘’”“]/g, '')  // Remove special chars
			.replace(/\-\-+/g, '-')                      	// Replace multiple - with single -
			.replace(/^-+/, '')                          	// Trim - from start of text
			.replace(/-+$/, '');                         	// Trim - from end of text

		return decodeURI( encodeURIComponent( parsedSlug ) );
	};


	AFFILIATETOC = {

		init: function() {

			$( document ).delegate( ".affiliate-toc-list a", "click", AFFILIATETOC._scroll )
			$( document ).delegate( ".affiliate-toc-scroll-top", "click", AFFILIATETOC._scrollTop )
			$( document ).delegate( '.affiliate-toc-title-wrap', 'click', AFFILIATETOC._toggleCollapse )
			$( document ).on( "scroll", AFFILIATETOC._showHideScroll  )

		},

		_toggleCollapse: function( e ) {
			if ( $( this ).find( '.affiliate-toc-collapsible-wrap' ).length > 0 ) {
				let $root = $( this ).closest( '.wp-block-affiliate-blocks-ab-tableof-content' )
					const parentElem = $( this ).find('.affiliate-table-of-contents-toggle');
					parentElem.toggleClass('affiliate-toc-collapsed');
		
				if ( $root.hasClass( 'affiliate-toc-collapse' ) ) {
					$root.removeClass( 'affiliate-toc-collapse' );
				} else {
					$root.addClass( 'affiliate-toc-collapse' );
				}
			}
		},

		_showHideScroll: function( e ) {

			if ( null != scroll_element ) {

				if ( jQuery( window ).scrollTop() > 300 ) {
					if ( scroll_to_top ) {
						scroll_element.addClass( "affiliate-toc-show-scroll" )
					} else {
						scroll_element.removeClass( "affiliate-toc-show-scroll" )
					}
				} else {
					scroll_element.removeClass( "affiliate-toc-show-scroll" )
				}
			}
		},

		/**
		 * Smooth To Top.
		 */
		_scrollTop: function( e ) {

			$( "html, body" ).animate( {
				scrollTop: 0
			}, scroll_delay )
		},

		/**
		 * Smooth Scroll.
		 */
		_scroll: function( e ) {

			if ( this.hash !== "" ) {

				var hash = this.hash
				var node = $( this ). closest( '.wp-block-affiliate-blocks-ab-tableof-content' )

				scroll = node.data( 'scroll' )
				scroll_offset = node.data( 'offset' )
				scroll_delay = node.data( 'delay' )

				if ( scroll ) {

					var offset = $( decodeURIComponent( hash ) ).offset()

					if ( "undefined" != typeof offset ) {

						$( "html, body" ).animate( {
							scrollTop: ( offset.top - scroll_offset )
						}, scroll_delay )
					}
				}

			}
		},

		/**
		 * Alter the_content.
		 */
		_run: function( attr, id ) {
			
			var $this_scope = $( id );

			if ( $this_scope.find( '.affiliate-toc-collapsible-wrap' ).length > 0 ) {
				$this_scope.find( '.affiliate-toc-title-wrap' ).addClass( 'affiliate-toc-is-collapsible' );
			}
			
			var $headers = JSON.parse(attr.headerLinks);
			
			var allowed_h_tags = [];

			var new_h_tags = [];

			var arr = $.makeArray( attr.mappedHeaders );

			var abcd = arr[0];
			var xyz = [];
			// console.log(abcd)
			var i;
			for (i = 0; i < 6; i++) {
				if(abcd['h'+(i+1)] === true) {
					allowed_h_tags.push('h'+(i+1));
				}
			}
			var allowed_h_tags_str = ( null !== allowed_h_tags ) ? allowed_h_tags.join( ',' ) : '';

			// var arr = $.makeArray( attr.mappedHeaders );
			// var abcd = arr[0];
			console.log("out put of $headerr")
			console.log($headers)
				console.log('==========================');
			
			// abcd.forEach((p_tag, index) => p_tag === true ? console.log(p_tag) : null);
			// Object.keys(abcd).forEach((tags,index) =>{
			
			// });

			// if ( undefined !== arr ) {

			// 	mappedHeaders.forEach((h_tag, index) => h_tag === true ? new_h_tags.push(h_tag) : null);
			// 	var new_h_tags_str = ( null !== new_h_tags ) ? new_h_tags.join( ',' ) : '';
			// }
			
			// console.log(new_h_tags)

			// if ( undefined !== attr.mappingHeaders ) {

			// 	attr.mappingHeaders.forEach((h_tag, index) => h_tag === true ? allowed_h_tags.push('h' + (index+1)) : null);
			// 	var allowed_h_tags_str = ( null !== allowed_h_tags ) ? allowed_h_tags.join( ',' ) : '';
			// }

			console.log('out put of (allowed_h_tags)')
			console.log(allowed_h_tags)
			console.log("===========================================")

			var all_header = ( undefined !== allowed_h_tags_str && '' !== allowed_h_tags_str ) ? $( 'body' ).find( allowed_h_tags_str ) : $( 'body' ).find('h1, h2, h3, h4, h5, h6' );

			console.log('out put of (all_header')
			console.log(all_header)
			console.log("===========================================")

			if ( undefined !== $headers && 0 !== all_header.length ) {

				$headers.forEach(function (element, i) {
					
					let element_text = parseTocSlug(element.text);
					all_header.each( function (){

						let header = $( this );
						console.log('out put of (header_text)')
						console.log(header)
						console.log("===========================================")
							console.log(header.text())
						console.log("===========================================")
						let header_text = parseTocSlug(header.text());
						console.log('out put of (header_text)')
						console.log(header_text)
						console.log("===========================================")
						if ( element_text.localeCompare(header_text) === 0 ) {
							header.before('<span id="' + header_text + '" class="affiliate-toc-heading-anchor"></span>');
						}
					});
				});
			}

			scroll_to_top = attr.scrollToTop

			scroll_element = $( ".affiliate-toc-scroll-top" )
			if ( 0 == scroll_element.length ) {
				$( "body" ).append( "<div class=\"affiliate-toc-scroll-top dashicons dashicons-arrow-up-alt2\"></div>" )
				scroll_element = $( ".affiliate-toc-scroll-top" )
			}

			if ( scroll_to_top ) {
				scroll_element.addClass( "affiliate-toc-show-scroll" )
			} else {
				scroll_element.removeClass( "affiliate-toc-show-scroll" )
			}

			AFFILIATETOC._showHideScroll()
		},
	}

	$( document ).ready(function() {
		AFFILIATETOC.init()
	})


} )( jQuery )