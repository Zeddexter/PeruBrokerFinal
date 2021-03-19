/* eslint-disable no-var */
/* eslint-disable no-unused-vars */



( function( $ ) {
	var cstart, cend;
	var stab = 'settings';
	var hash = document.location.hash.replace( '#', '' );

	$( window ).on( 'hashchange', function( ) {
		hash = document.location.hash.replace( '#', '' );
		gtbbShowTab( hash );
	});

	if ( document.cookie.length > 0 ) {
		cstart = document.cookie.indexOf( 'tab=' );
		if ( cstart !== -1 ) {
			cstart = cstart + 4;
			cend = document.cookie.indexOf( ';', cstart );
			if ( cend === -1 ) {
				cend = document.cookie.length;
			}
			stab = unescape( document.cookie.substring( cstart, cend ) );
		}
	}


	if ( hash !== '' ) {
		stab = hash;
	}


	function gtbbShowTab( tab ) {
		$( '.sections-container' ).addClass( 'hidden' );
		$( '#sections-' + tab ).removeClass( 'hidden' );
		$( '.nav-tab-wrapper>a' ).removeClass( 'nav-tab-active' );
		$( '.nav-tab-wrapper>a#tab-' + tab ).addClass( 'nav-tab-active' );
		document.location = '#' + tab;
	}


	$( '.sections-container' ).each( function( ) {
		var slug = $( this ).attr( 'id' ).replace( 'sections-', '' );
		var title = $( this ).attr( 'title' );
		var icon = $( this ).attr( 'data-icon' );
		var iconhtml = icon !== '' ? '<span class="dashicons-before ' + icon + '"></span>' : '';

		var $tab = $( '<a id="tab-' + slug + '" class="nav-tab">' + iconhtml + title + '</a>' );
		$tab.on( 'click', function() {
			document.cookie = 'tab=' + slug;
			gtbbShowTab( slug );
		});
		$( '.nav-tab-wrapper' ).append( $tab );
	});


	gtbbShowTab( stab );

	if ( ! $( 'input[name=\'gtbbootstrap_options[bootstrap_colors_included]\']' ).is( ':checked' ) ) {
		$( '#bootstrap-colors' ).hide();
	}
	$( 'input[name=\'gtbbootstrap_options[bootstrap_colors_included]\']' ).change( function() {
		if ( $( 'input[name=\'gtbbootstrap_options[bootstrap_colors_included]\']' ).is( ':checked' ) ) {
			$( '.colors' ).removeClass( 'closed' );
			$( '#bootstrap-colors' ).slideDown();
		} else {
			$( '.colors' ).addClass( 'closed' );
			$( '#bootstrap-colors' ).slideUp();
		}
	});

	$( '.color-field' ).wpColorPicker();

	if ( $( 'input[name=\'gtbbootstrap_options[bootstrap_included]\']:checked' ).val() !== 'N' && ! $( 'input[name=\'gtbbootstrap_options[bootstrap_on_template]\']' ).is( ':checked' ) ) {
		$( '#gtbbootstrap_bootstrap_version' ).addClass( 'closed' );
	}

	$( 'input[name=\'gtbbootstrap_options[bootstrap_included]\'],input[name=\'gtbbootstrap_options[bootstrap_on_template]\']' ).change( function() {
		if ( $( 'input[name=\'gtbbootstrap_options[bootstrap_included]\']:checked' ).val() === 'N' || $( 'input[name=\'gtbbootstrap_options[bootstrap_on_template]\']' ).is( ':checked' ) ) {
			$( '#gtbbootstrap_bootstrap_version' ).removeClass( 'closed' );
		} else {
			$( '#gtbbootstrap_bootstrap_version' ).addClass( 'closed' );
		}
	});

	$( '#updater-box' ).show();
}( jQuery ) );

